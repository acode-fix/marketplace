<?php

namespace App\Http\Controllers;

use App\Models\BadgeUnit;
use App\Models\Payment;
use App\Models\User;
use App\Models\Verification;
use Barryvdh\Debugbar\Facades\Debugbar;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    public function badgeFeePaystackInit(Request $request)
    {

        $user = $request->user();
        $userId = $user->id;
        $userEmail = $user->email;

        if ($user) {

            $badgeType = $user->badge_type;

            if ($badgeType) {

                $badgeDetails = BadgeUnit::where('name', $badgeType)->first();

                $amount = $badgeDetails->amount;
                $purpose = $badgeDetails->purpose;
                $desc = $badgeDetails->description;

                $txn = Payment::generateTxn();
                $inv = Payment::generateInvoice();

                $payment = Payment::Create([
                    'user_id' => $userId,
                    'amount' => $amount,
                    'purpose' => $purpose,
                    'invoice_number' => $inv,
                    'transaction_reference' => $txn,
                    'description' => $desc,
                ]);

                $amount_to_payStack = Payment::convinientfees($amount);

                Debugbar::info($amount, $txn, $inv, $purpose, $desc, $amount, $amount_to_payStack);

                $response = $this->initPaystackTransaction($userEmail, $amount_to_payStack, $txn);

                DebugBar::info($response);

                if (isset($response['data']['authorization_url'])) {
                    $paystack_url = $response['data']['authorization_url'];

                    return response()->json([
                        'status' => true,
                        'message' => 'payment url',
                        'paystack_url' => $paystack_url,
                    ]);

                } else {

                    return response()->json([
                        'status' => false,
                        'message' => 'Failed to initialize payment with paystack',

                    ], 500);

                }

            } else {

                return response()->json([
                    'status' => false,
                    'message' => 'Incompelete Verification Form',

                ], 404);

            }

        } else {

            return response()->json([
                'status' => false,
                'message' => 'Incompelete Verification Form ',

            ], 404);

        }

    }

    public function initPaystackTransaction($userEmail, $amount_to_payStack, $txn)
    {

        $url = 'https://api.paystack.co/transaction/initialize';

        $fields = [
            'email' => $userEmail,
            'amount' => $amount_to_payStack * 100,
            'reference' => $txn,
            'callback_url' => env('APP_URL').'/payment/callback',

        ];

        $fields_string = http_build_query($fields);

        // open connection
        $ch = curl_init();

        // set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer '.config('services.paystack.secret_key'),
            'Cache-Control: no-cache',
        ]);

        // So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // execute post
        $result = curl_exec($ch);

        Debugbar::info($result);

        $response = json_decode($result, true);

        return $response;

    }

    public function checkTransactionRef(Request $request)
    {

        $transactionRef = $request->query('trxref');

        Log::info($transactionRef);

        $checkTrxRef = Payment::where('transaction_reference', $transactionRef)->first();

        if ($checkTrxRef) {

            return $this->verifyTransaction($transactionRef);

        } else {

            //  return   redirect()->route('success.page')->with('error', 'Invalid Transaction Reference!!');

            return response()->json([
                'status' => false,
                'message' => 'Invalid Transaction Reference',
            ], 404);

        }

    }

     public function verifyTransaction($transactionRef)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/$transactionRef",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . config('services.paystack.secret_key'),
            'Cache-Control: no-cache',
        ],
    ]);

    $responses = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $response = json_decode($responses, true);

    if ($err) {
        return response()->json([
            'status' => false,
            'message' => 'Paystack Verification Failed',
            'error' => $err,
        ], 400);
    }

    //  Corr Paystack response validation
    if (!isset($response['status']) || !$response['status']) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid Paystack response',
            'response' => $response,
        ], 400);
    }

    $status = $response['data']['status'];
    $gatewayRes = $response['data']['gateway_response'];
    $paymentDate = $response['data']['paid_at'];
    $currency = $response['data']['currency'];
    $transactionRef = $response['data']['reference'];
    $amount = $response['data']['amount'];

    Debugbar::info($response, $status, $gatewayRes, $currency, $paymentDate, $amount);

    // Ensure payment was successful
    if ($status !== 'success') {
        return response()->json([
            'status' => false,
            'message' => 'Payment not successful',
        ], 400);
    }

    $payment = Payment::where('transaction_reference', $transactionRef)->first();

    if (!$payment) {
        return response()->json([
            'status' => false,
            'message' => 'Transaction could not be found',
        ], 404);
    }

    //  Prevent duplicate processing
    if ($payment->status == 1) {
        return response()->json([
            'status' => true,
            'message' => 'Transaction already processed',
        ]);
    }


    // Update payment
    $payment->update([
        'status' => 1,
        'gateway_response' => $gatewayRes,
        'payment_date' => $paymentDate,
        'currency' => $currency,
    ]);

    $user = User::find($payment->user_id);
    $badgeDetails = null;

    if ($user) {

        if ($user->verify_status == 0) {

            // Move to pending
            $user->verify_status = -2;
            $user->save();

        } elseif ($user->verify_status == 1) {

            // Activate badge
            $purchaseDate = CarbonImmutable::now();
            $expiryDate = Payment::getExpiryDate($user->badge_type);

            $badgeDetails = [
                'purchase_date' => $purchaseDate,
                'expiry_date' => $expiryDate,
                'badge_status' => 1,
            ];

            $user->update($badgeDetails);
        }
    }

    return response()->json([
        'status' => true,
        'message' => 'Transaction completed successfully',
        'data' => $badgeDetails,
        'badge_updated' => $badgeDetails ? true : false,
    ]);
}

    public function successPage()
    {

        return view('other_frontend.payment_success');
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
