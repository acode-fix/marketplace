<?php

namespace App\Services;

use App\Models\Plan;
use App\Models\Subscription;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PaystackSubscriptionService
{
  protected string $baseUrl;
  protected string $secret;
  public function __construct()
  {
    $this->baseUrl = config('services.paystack.base_url');
    $this->secret = config('services.paystack.secret_key');
  }

  public function request(string $endpoint, array $data = [])
  {  
  
    $response = Http::withToken(token: $this->secret)->post($this->baseUrl . $endpoint, data: $data);

    if (! $response->successful()) {
      Log::error('Paystack initialization failed', [
        'body' => $response->body(),
        'json' => $response->json()
      ]);


      throw new Exception(
        $response->json()['message'] ?? 'Paystack Api error',
      );
    }

    return $response->json()['data'] ?? $response->json();
  }


  public function initalizeSubscription(string $email, string $planCode, int $amount, string $callbackUrl)
  {
    return $this->request('/transaction/initialize', [
      'email' => $email,
      'plan' => $planCode,
      'amount' => $amount,
      'callback_url' => $callbackUrl
    ]);
  }

  public function cancelSubscription(string $subscriptionCode, string $emailToken)
  {

    return $this->request('/subscription/disable', [
      'code' => $subscriptionCode,
      'token' => $emailToken,
    ]);
  }

  public function enableSubscription(string $subscriptionCode, string $emailToken)
  {
    return $this->request('/subscription/enable', [
      'code' => $subscriptionCode,
      'token' => $emailToken
    ]);
  }




  public function getPlanCode(string $plan): string
  {
    return match ($plan) {
      'monthly' => config('services.paystack.monthly_plan'),
      'yearly' => config('services.paystack.yearly_plan'),
      default => throw new NotFoundHttpException('Plan not found')
    };
  }

  public function getPlan($planCode): Plan
  {
    return Plan::where('plan_code', $planCode)->firstOrFail();
  }

  public function getSubscription(int $userId): ?Subscription
  {
    return Subscription::where('user_id', $userId)->first();
  }
}
