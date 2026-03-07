<?php

namespace App\Services;

use App\Enums\InvoiceStatus;
use App\Enums\SubscriptionStatus;
use App\Enums\WebhookEvent;
use App\Helpers\Helper;
use App\Models\Invoice;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function Laravel\Prompts\warning;

class PaystackWebhookService
{

  public function verifySignature(Request $request): bool
  {

    $paystackSignature = $request->header('X-paystack-signature');

    if (! $paystackSignature) return false;

    $secret = config('services.paystack.secret_key');

    $computedSignature = hash_hmac('sha512', $request->getContent(), $secret);

    return hash_equals(known_string: $computedSignature, user_string: $paystackSignature);
  }

  public function handle(string $event, array $data)
  {
    $start = microtime(true);

    Log::info(message: 'Webhook event received:' . $event);

    match ($event) {
      WebhookEvent::SUBSCRIPTION_CREATE->value => $this->handleSubscriptionCreate($data),
      WebhookEvent::INVOICE_CREATE->value => $this->handleInvoiceCreate($data),
      WebhookEvent::CHARGE_SUCCESS->value => $this->handleChargeSuccess($data),
      WebhookEvent::INVOICE_PAYMENT_FAILED->value => $this->handlePaymentFailed($data),
      WebhookEvent::INVOICE_UPDATE->value => $this->handleInvoiceUpdate($data),
      WebhookEvent::SUBSCRIPTION_NOT_RENEW->value => $this->handleNotRenew($data),
      WebhookEvent::SUBSCRIPTION_DISABLE->value => $this->handleDisable($data),
      default => Log::info(message: "Unhandled paystack webhook event: {$event}") ?: null
    };

    Log::info("Webhook {$event} processed", [
      'time' => microtime(true) - $start,
      'subscription_code' => $data['subscription_code'] ?? null,
      'reference' => $data['reference'] ?? null,
    ]);
  }

  private function handleSubscriptionCreate(array $data)
  {

    $user = Helper::getUser(email: $data['customer']['email']);

    if (! $user) {
      Log::warning('User not found for subscription', $data);
      return;
    }

    $plan = Helper::getPlan(planCode: $data['plan']['plan_code']);

    if (! $plan) {
      Log::warning('User not found for subscription', $data);
      return;
    }

    Subscription::updateOrCreate(
      ['subscription_code' => $data['subscription_code']],
      [
        'user_id' =>  $user->id,
        'plan_id' => $plan->id,
        'authorization_code' => $data['authorization']['authorization_code'],
        'customer_code' => $data['customer']['customer_code'],
        'email_token' => $data['email_token'],
        'status' => SubscriptionStatus::from($data['status']),
        'period_start' => $this->formatDate($data['created_at'] ?? null) ?? now(),
        'period_end' => $this->formatDate($data['next_payment_date'] ?? null),
        'next_payment_date' => $this->formatDate($data['next_payment_date'] ?? null),
      ]
    );
    $this->logProcessed(WebhookEvent::SUBSCRIPTION_CREATE->value, $data);
  }

  private function handleInvoiceCreate(array $data)
  {
    if (! isset($data['subscription']['subscription_code'])) return;

    $subscription = $this->getSubscription(subscriptionCode: $data['subscription']['subscription_code']);

    if (! $subscription) return;

    Invoice::updateOrCreate(
      ['invoice_code' => $data['invoice_code']],
      [
        'subscription_id' => $subscription->id,
        'amount' => ($data['amount']  ?? 0) / 100,
        'currency' => $data['transaction']['currency'] ?? $data['currency'] ?? 'NGN',
        'status' => InvoiceStatus::from($data['status'] ?? 'pending'),
        'paid' => $data['paid'] ?? false,
        'period_start' => $this->formatDate($data['period_start'] ?? null),
        'period_end' => $this->formatDate($data['period_end'] ?? null),
      ]
    );
    $this->logProcessed(WebhookEvent::INVOICE_CREATE->value, $data);
  }

  private function handleChargeSuccess(array $data)
  {

    $subscription = $this->getSubscriptionFromCharge($data);
    if (! $subscription) {
      Log::warning('Subscription not found for charge.success', $data);
    return;


    } 

    $invoice = null;

    if (isset($data['invoice_code'])) {
      $invoice = $this->getInvoice($data['invoice_code']);
    }

    if (! $invoice) {

      $invoice = Invoice::create([
        'invoice_code' => $data['invoice_code'] ?? $data['reference'],
        'subscription_id' => $subscription->id,
        'amount' => ($data['amount'] ?? 0) / 100,
        'currency' => $data['currency'] ?? 'NGN',
        'status' => InvoiceStatus::SUCCESS,
        'paid' => true,
        'paid_at' => now(),
        'transaction_reference' => $data['reference'] ?? null,
        'period_start' => $this->formatDate($data['created_at'] ?? null),
        'period_end' => $this->formatDate($data['period_end'] ?? null),
      ]);
    } else {

      $invoice->update([
        'status' => InvoiceStatus::SUCCESS,
        'paid' => true,
        'paid_at' => now(),
        'transaction_reference' => $data['reference'] ?? null,
      ]);
    }

    $subscription->update([
      'status' => SubscriptionStatus::ACTIVE,
      'period_start' => $this->formatDate($data['created_at'] ?? null) ?? now(),
      'period_end' => $this->formatDate($data['next_payment_date'] ?? null) ?? $subscription->period_end,
      'next_payment_date' => $this->formatDate($data['next_payment_date'] ?? null) ?? $subscription->next_payment_date,
    ]);

    $this->logProcessed(WebhookEvent::CHARGE_SUCCESS->value, $data);
  }

  private function handlePaymentFailed(array $data)
  {
    if (! isset($data['subscription']['subscription_code'])) return;

    $subscription = $this->getSubscription(subscriptionCode: $data['subscription']['subscription_code']);

    if (! $subscription) return;

    if ($data['invoice_code']) {
      $invoice = $this->getInvoice($data['invoice_code']);

      if ($invoice) {
        $invoice->update([
          'status' => InvoiceStatus::FAILED,
          'paid' => false,

        ]);
      }
    }

    $subscription->update([
      'status' => SubscriptionStatus::PAST_DUE,
    ]);

    $this->logProcessed(WebhookEvent::INVOICE_PAYMENT_FAILED->value, $data);
  }

  private function handleInvoiceUpdate(array $data)
  {
    if (! isset($data['invoice_code'])) return;

    $invoice = $this->getInvoice($data['invoice_code']);

    if (! $invoice) return;

    $invoice->update([
      'status' => InvoiceStatus::from($data['status'] ?? 'pending'),
      'paid' => $data['paid'] ?? false,
      'paid_at' => $this->formatDate($data['paid_at'] ?? null),

    ]);

    $this->logProcessed(WebhookEvent::INVOICE_UPDATE->value, $data);
  }

  private function handleNotRenew(array $data)
  {
    if (! isset($data['subscription_code'])) return;

    $subscription = $this->getSubscription(subscriptionCode: $data['subscription_code']);

    if (! $subscription) return;

    $subscription->update([
      'status' => SubscriptionStatus::NON_RENEWING
    ]);

    $this->logProcessed(WebhookEvent::SUBSCRIPTION_NOT_RENEW->value, $data);
  }

  private function handleDisable(array $data)
  {
    if (! isset($data['subscription_code'])) return;

    $subscription = $this->getSubscription($data['subscription_code']);

    if (! $subscription) return;

    $subscription->update([
      'status' => SubscriptionStatus::CANCELLED,
      'cancelled_at' => now(),
      'period_end' => $this->formatDate($data['next_payment_date'] ?? null) ?? $subscription->period_end,

    ]);
    $this->logProcessed(WebhookEvent::SUBSCRIPTION_DISABLE->value, $data);
  }

  private function getSubscription($subscriptionCode): ?Subscription
  {
    return Helper::getSubscription(subscriptionCode: $subscriptionCode);
  }

  private function getInvoice($invoiceCode): ?Invoice
  {
    return Helper::getInvoice(invoiceCode: $invoiceCode);
  }

  private function getSubscriptionFromCharge(array $data)
  {
    return  Subscription::where('customer_code', $data['customer']['customer_code'])
    ->whereHas('plan', function($query) use ($data){
      $query->where('plan_code', $data['plan']['plan_code']);
    })
    ->latest()
    ->first();
  }

  private function formatDate($date): Carbon|null
  {
    try {
      return $date ? Carbon::parse($date) : null;
    } catch (\Exception $e) {
      return null;
    }
  }


  private function logProcessed(string $event, array $data = [])
  {
    Log::info('Paystack webhook processed: ' . $event, [
      'subscription_code' => $data['subscription_code']
        ?? $data['subscription']['subscription_code']
        ?? null,

      'invoice_code' => $data['invoice_code']
        ?? $data['invoice']['invoice_code']
        ?? null,

      'customer_code' => $data['customer']['customer_code']
        ?? null,
    ]);
  }
}
