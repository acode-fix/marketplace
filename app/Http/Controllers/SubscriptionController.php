<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Services\PaystackSubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class SubscriptionController extends Controller
{
    public function __construct(public PaystackSubscriptionService $paystack) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function initialize(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'interval' => ['required', 'string', 'in:monthly,annually'],
        ]);

        $user = auth()->user();

       // $planCode = $this->paystack->getPlanCode(plan: $validated['plan']);
        $plan = $this->paystack->getPlan( interval: $validated['interval']);
        $amount = (int)  $plan->amount * 100;

        $response =  $this->paystack->initalizeSubscription(email: $user->email, planCode: $plan->plan_code, amount: $amount, callbackUrl: config('app.frontend_url') . '/subscription/callback');

        return $this->successResponse(
            message: 'Transaction initialized successfully',
            data: ['authorization_url' => $response['authorization_url']],
            statusCode: Response::HTTP_OK,
        );
    }

    public function cancel(Request $request): JsonResponse
    {


        $subscription = auth()->user()->subscription;

        if (!$subscription) {
            return $this->errorResponse(
                message: 'No active subscription found',
                statusCode: Response::HTTP_NOT_FOUND
            );
        }

        $this->paystack->cancelSubscription($subscription->subscription_code, $subscription->email_token);

        return $this->successResponse(
            message: 'Subscription cancelled successfully. Acess remains untill the end of your billing cycle',
            statusCode: Response::HTTP_OK,
        );
    }



    /**
     * 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $subscription = auth()->user()->subscription;


        $data = [
            'active' => $subscription && !$subscription->period_end  ->isPast(),
            'plan' => $subscription?->plan?->name,
            'expires_at' => $subscription?->period_end,

        ];

        return $this->successResponse(
            message: 'Subscription status fetched successfully',
            data: $data,
            statusCode: Response::HTTP_OK,


        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
