<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Verification;
use App\Models\Payment;
use App\Models\BadgeUnit;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Carbon\CarbonImmutable;

class PaymentController extends Controller
{   
    public function badgeFeePaystackInit(Request $request) {
        
        $user = $request->user();
        $userId = $user->id;
        $userEmail = $user->email;

       if($user) {

           $badgeType = $user->badge_type;

        if ($badgeType) {

           $badgeDetails =  BadgeUnit::where('name', $badgeType)->first();

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

           Debugbar::info($amount, $txn,$inv, $purpose, $desc,$amount, $amount_to_payStack);

           $response = $this->initPaystackTransaction($userEmail, $amount_to_payStack, $txn);

           DebugBar::info($response);

           if(isset($response['data']['authorization_url'])) {
            $paystack_url = $response['data']['authorization_url'];

              return response()->json([
                'status' => true,
                'message' => 'payment url',
                'paystack_url' => $paystack_url,
              ]);

           }else {

             return response()->json([
                'status' => false,
                'message' => 'Failed to initialize payment with paystack',
                

             ], 500);


             }

           

           } else {

            return response()->json([
                'status' => false,
                'message' => 'Incompelete Verification Form',

            ],404);

           }
        
        }else {

            return response()->json([
                'status' => false,
                'message' => 'Incompelete Verification Form ',

            ],404);


        }
        
    }

    public function initPaystackTransaction($userEmail,$amount_to_payStack, $txn,) {


        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' => $userEmail,
            'amount' =>  $amount_to_payStack * 100,
            'reference' => $txn,
            'callback_url' => env('APP_URL') . '/payment/callback',
            
            
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . config('services.secret_key.key'),
            "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $result = curl_exec($ch);
        
        Debugbar::info($result);

        $response = json_decode($result, true);


        return $response;


    }

    public function checkTransactionRef(Request $request) {

        $transactionRef = $request->query('trxref');

        Log::info($transactionRef); 

        $checkTrxRef = Payment::where('transaction_reference', $transactionRef)->first();

        if($checkTrxRef) {
                
            return $this->verifyTransaction($transactionRef);

        }else {

         return   redirect()->route('success.page')->with('error', 'Invalid Transaction Reference!!');

           /* return response()->json([
                'status' => false,
                'message' => 'Invalid Transaction Reference'
            ], 404);

            */
        }

    }

    public function verifyTransaction($transactionRef) {

        //log::info($transactionRef);

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$transactionRef",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer " . config('services.secret_key.key'),
            "Cache-Control: no-cache",
            ),
        ));
        
        $responses = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($responses, true);

       // Debugbar::info($responses);
        
        if ($err) {
       /* echo "cURL Error #:" . $err;
           return response()->json([
            'status' => false,
            'message' => 'Paystack Verification Failed',
             'error' => $err,

           ], 400);
       */
          return redirect()->route('success.page')->with('error',  'Paystack Verification Failed:'. $err);

        } else {
           //echo $responses;

           if(array_key_exists('status', $response)) {
               
            //Log::info('exists');

            $status = $response['data']['status'];
            $gatewayRes = $response['data']['gateway_response'];
            $paymentDate = $response['data']['paid_at'];
            $currency = $response['data']['currency'];
            $transactionRef = $response['data']['reference'];
            $amount = $response['data']['amount'];

            Debugbar::info($response, $status, $gatewayRes, $currency,$paymentDate, $amount);

            if($status === 'success') {

                $storeTransaction = [
                    'status' => 1,
                    'gateway_response' => $gatewayRes,
                    'payment_date' => $paymentDate,
                    'currency' => $currency,
                ];

                $payment = Payment::where('transaction_reference', $transactionRef)->first();

            
                if($payment) {

                    $userId = $payment->user_id;

                    //change status to pending;

                    $user = User::where('id', $userId)->where('verify_status', 0)->first();

                    if($user) {
                        
                        $user->verify_status = -2;
                        $user->save();

                    }

                    $user = User::where('id',$userId)->where('verify_status', 1)->first();

                    if($user) {

                        $purchaseDate = CarbonImmutable::now();
                        $expiryDate = Payment::getExpiryDate($user->badge_type);

                        $badgeDetails = [
                            'purchase_date' => $purchaseDate,
                            'expiry_date' => $expiryDate,
                            'badge_status' => 1,
                        ];

                        $user->update($badgeDetails);

                    }

                   

                    $payment->update($storeTransaction);

                    return redirect()->route('success.page')->with(
                        'message','Transaction Successful');


                } else {

                    return redirect()->route('success.page')->with('error', 'Transaction Details Could Not Be Saved!!');

                   /* return response()->json([
                        'status' => false,
                        'message' => 'Transaction could not be saved',
                    ],404);
                    */

                }



            }else {

                return redirect()->route('success.page')->with('error', 'Paystack Status Verification Failed!!');
               /*
                return response()->json([
                    'status' => false,
                    'message' => 'Paystack Status Failed',
                   ], 400);
              */
            }

            
           }else {

            return redirect()->route('success.page')->with('error', 'Paystack Status Key Is Empty!!');

          /*  return response()->json([
                'status' => false,
                'message' => 'Paystack Status Key Empty',
                'response' => $response,
    
               ], 400);
            */

           }



        }


    }

    public function successPage() {

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
