<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Verification;
use App\Models\Payment;
use App\Models\User;


class PaymentController extends Controller
{
    public function handlePaymentSuccess(Request $request)
    {
        $paymentDetails = $request->all(); // Replace with actual payment details retrieval logic

        $userId = $paymentDetails['user_id'] ?? null;
        if (!$userId) {
            return response()->json(['status' => false, 'message' => 'User not found.'], 404);
        }

        // Save payment record
        $payment = Payment::create([
            'user_id' => $userId,
            'payment_reference' => $paymentDetails['payment_reference'],
            'amount' => $paymentDetails['amount'],
            'currency' => $paymentDetails['currency'] ?? 'NGN',
            'status' => 'success', // Assuming the payment is successful
            // 'metadata' => json_encode($paymentDetails),
        ]);

        // Approve the verification if the payment is successful
        $verification = Verification::where('user_id', $userId)->first();
        if (!$verification) {
            return response()->json(['status' => false, 'message' => 'Verification record not found.'], 404);
        }

        $verification->approved = true;
        $verification->save();

        return response()->json(['status' => true, 'message' => 'Verification approved and payment recorded.']);
    }


    /**
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
    public function show(string $id)
    {
        //
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
