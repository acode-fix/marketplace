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

  public function request(string $method, string $endpoint, array $data = [])
  {

    $response = Http::withToken(token: $this->secret)->retry(3, 200)
      ->timeout(10)->{$method}($this->baseUrl . $endpoint,  $data);

    if (! $response->successful()) {
      Log::error('Paystack initialization failed', [
        'body' => $response->body(),
        'json' => $response->json()
      ]);


      throw new Exception(
        $response->json()['message'] ?? 'Paystack Api error',
      );
    }

    Log::info('Paystack response', [
      'body' => $response->body(),
      'json' => $response->json()
    ]);



    return $response->json()['data'] ?? $response->json();
  }

  public function createPlan(string $name, string $interval, int $amount)
  {
    return $this->request('post', '/plan', [
      'name' => $name,
      'interval' => $interval,
      'amount' => $amount,
    ]);
  }

  public function getPlans()
  {
    return $this->request('get', '/plan');
  }


  public function initalizeSubscription(string $email, string $planCode, int $amount, string $callbackUrl)
  {
    return $this->request('post', '/transaction/initialize', [
      'email' => $email,
      'plan' => $planCode,
      'amount' => $amount,
      'callback_url' => $callbackUrl
    ]);
  }

  public function cancelSubscription(string $subscriptionCode, string $emailToken)
  {

    return $this->request('post', '/subscription/disable', [
      'code' => $subscriptionCode,
      'token' => $emailToken,
    ]);
  }

  public function enableSubscription(string $subscriptionCode, string $emailToken)
  {
    return $this->request('post', '/subscription/enable', [
      'code' => $subscriptionCode,
      'token' => $emailToken
    ]);
  }




  public function getPlanCode(string $plan): string
  {
    return match ($plan) {
      'monthly' => config('services.paystack.monthly_plan'),
      'annually' => config('services.paystack.yearly_plan'),
      default => throw new NotFoundHttpException('Plan not found')
    };
  }

  public function getPlan($interval): Plan
  {
    return Plan::where('interval', $interval)->firstOrFail();
  }

  public function getSubscription(int $userId): ?Subscription
  {
    return Subscription::where('user_id', $userId)->first();
  }

  public function resolvePlan(string $interval): array{

  if(app()->environment('local', 'testing')){
    return [
      'plan_code' => $this->getPlanCode($interval),
      'amount' => 1000 * 100
    ];

  }

  $plan = $this->getPlan($interval);

  return [
    'plan_code' => $plan->plan_code,
    'amount' => (int) $plan->amount * 100,
  ];

  }
}
