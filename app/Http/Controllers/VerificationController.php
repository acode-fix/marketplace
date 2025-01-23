<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Verification;
use App\Models\User;
use App\Models\Shop;
use App\Models\Badge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Barryvdh\Debugbar\Facades\Debugbar;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Mail;
use App\Mail\RejectVerificationMail;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

       $perPage = $request->input('per_page', 10);
       $search = $request->input('search');

       $pendingUserApprovals = User::with('payment')->where('user_type', 2)->where('verify_status', -2);

       if($search) {
        $pendingUserApprovals->where(function($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                   ->orWhere('username', 'like', "%$search%" )
                   ->orWhere('email', 'like', "%$search%" )
                   ->orWhere('address', 'like', "%$search%" );
                   
        });

       }

       $users = $pendingUserApprovals->paginate($perPage);


       return response()->json([
        'status' => true,
        'message' => 'User with pending approval fetched successfully',
        'users' => $users->items(),
        'total' => $users->total(),
        'filtered_total' => $users->total(),
       ],200);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function approveUserVerification(Request $request) {

        $userId =  $request->userId;

        $payment = Payment::with('user')->where('user_id', $userId)->where('status', 1)->first();

        if(!$payment) {
            DebugBar::info($payment);
            return response()->json([
                'status' => false,
                 'message' => 'Payment Verification Failed'

            ], 404);


        } else {

         //   $shopNo = Shop::shopNo();
           

           // DeBugBar::info($shopNo, $shopToken, $payment->user);

            $user = $payment->user;

            if(!$user || !$user->badge_type) {

                return response()->json([
                    'status' => false,
                    'message' => 'User Associated with Payment Not Found'

                ],404);


            }else {

                $purchaseDate = CarbonImmutable::now();
                $expiryDate = Payment::getExpiryDate($user->badge_type);

                $validate = [
                //    'shop_no' => $shopNo,
                    'verify_status' => 1,
                    'badge_status' => 1,
                    'purchase_date' => $purchaseDate,
                    'expiry_date' => $expiryDate,
                ];

                if($user->update($validate)) {

                    return response()->json([
                        'status' => true,
                        'message' => 'User Verification Approved Successfully'

                    ],200);
                }else {

                    return response()->json([

                        'status' => false,
                        'message' => 'User Verification Approval Unsuccessfull!!'

                    ], 400);
                }

               

               // Debugbar::info($purchaseDate, $expiryDate);

       }    
                        
        }

 

    }

    public function rejectUserVerification(Request $request) {
 
        $userId = $request->userId;

        DeBugBar::info($request->userId,
        $request->text);

        $user = User::find($userId);

        if(!$user) {

            return response()->json([
                'status' => false,
                'message' => 'User Does Not Exist',

            ],404);



        } else {

          $email =  $user->email ??  '';
          $name = $user->name ?? '';
          $phone_number = $user->phone_number ?? '';
          $text = $request->text;


         try{
            
            Mail::to($email)->send(new RejectVerificationMail($name, $email, $phone_number, $text));

            $user->verify_status = -1;
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Mail Sent Succesfully to User'

            ], 200);

        } catch(\Exception $e) {


            return response()->json([
                'status' => false,
                'message' => 'Mail  Not Sent Succesfully to User !!'. $e->getMessage(),

            ], 500);


        }
 
           


         







        }



        

    }
    

    public function bioForm(Request $request) {

        $validator = Validator::make($request->all(),[

            'email' => 'required|email',
            'nationality' => 'required|string',
            'name' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|in:male,female',
            'phone_number' =>['required', 'regex:/^(080|091|090|070|081)[0-9]{8}$/'],
            

        ]);

        debugbar::info($validator);


        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation errror',
                'errors' => $validator->errors(),

            ],422);
        }

        $user = $request->user();
        

        $details = [
        'email' => $request->email,
        'nationality' => $request->nationality,
        'name' => $request->name,
        'address' => $request->address,
        'gender' => $request->gender,
        'phone_number' => $request->phone_number,
        ];

    
    
      if($user->update($details)) {

        return response()->json([
            'status' => true,
            'message' => 'Bio-Form Submitted Successfully'
        ],200);
      }else {

        return response()->json([
            'status'=> false,
            'message' => 'Bio-Form Submission Fails'
        ],400);
      }




    }

    public function ninUpload(Request $request) {

        $validator = Validator::make($request->all(),[

            'nin_file' => 'required|file|mimes:jpeg,png,pdf',

        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors(),

            ],422);
        }

        if ($request->hasFile('nin_file')) {

            $ninFile = $request->file('nin_file');
            $rad = mt_rand(1000, 9999);

            $ninFileName = md5($ninFile->getClientOriginalName()) . $rad . '.' .$ninFile->getClientOriginalExtension();
            $ninFile->move(public_path('./uploads/nins'), $ninFileName);

            $user = $request->user();
    
            if($user) {
    
                $user->nin_file = $ninFileName;
                $user->save();
    
                return response()->json([
                    'status' => true,
                    'message' => 'NIN Uploaded Successfully',
    
                ],200);
            }else {
    
                return response()->json([
                    'status' => false,
                    'message' => 'Bio-Form Must Be Completed First',
    
                ],404);
            }

        }

       


    }

    public function ninCamUpload(Request $request) {

        Debugbar::info($request->canvasImage);

        $validator = Validator::make($request->all(),[
            'canvasImage' => 'required | string',

        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors(), 


            ], 422);


        }

        $encodedData = str_replace(' ','+', $request->canvasImage);

        list(, $encodedData) = explode(',', $encodedData);

        $decodedData = base64_decode($encodedData);

        if($decodedData) {
            $rad = mt_rand(1000, 9999);
            $extension = 'png';
            $ninFileName = md5($rad . time() . '.' . $extension);

            $ninFilePath = './uploads/nins/';

                if(!file_exists($ninFilePath)) {
                    mkdir($ninFilePath, 0777, true);

                }
            file_put_contents($ninFilePath . $ninFileName, $decodedData);

            $user = $request->user();

            Debugbar::info($ninFileName);
            Debugbar::info($user);
    
        
    
            if($user) {
    
                $user->nin_file = $ninFileName;
                $user->save();
    
                return response()->json([
                    'status' => true,
                    'message' => 'NIN Captured Succesfully',
        
                ], 200);
    
            }else {
    
                return response()->json([
                    'status' => false,
                    'message' => 'Bio-Form Must Be Completed First',
        
                ], 404);
    
            }
          
        }else {

            return response()->json([
                'status' => false,
                'message' => 'NIN Was Not Captured Successfully',
    
            ], 400);
    
    
         }
        















    }


    public function imageUpload(Request $request) {

      Debugbar::info($request->canvasImage); 

      $validator = Validator::make($request->all(),[

        'canvasImage' => 'required|string',

      ]);

      if($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation Error',
            'errors'  => $validator->errors(),
        ], 422);
        
      }
      
     $encodedData = str_replace(' ','+',$request->canvasImage);

     list(, $encodedData) = explode(',', $encodedData);

     $decodedData = base64_decode($encodedData);

     if($decodedData) {

        $rad = mt_rand(1000, 9999);
        $extension = 'png';
        $selfieName = md5($rad . time()). '.' . $extension;

        $selfiePhotoPath = './uploads/selfiePhotos/';

        if (!file_exists($selfiePhotoPath)) {
            mkdir($selfiePhotoPath, 0777, true); 
        }

        file_put_contents($selfiePhotoPath . $selfieName, $decodedData);


        $user = $request->user();

        Debugbar::info($selfieName);
        Debugbar::info($user);

    

        if($user) {

            $user->selfie_photo = $selfieName;
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Selfie Captured Succesfully',
    
            ], 200);

        }else {

            return response()->json([
                'status' => false,
                'message' => 'Bio-Form Must Be Completed First',
    
            ], 404);

        }
        
    
     } else {

        return response()->json([
            'status' => false,
            'message' => 'Selfie Was Not Captured Successfully',

        ], 400);


     }
    




    }


    public function badgeType(Request $request) {

        $validator = Validator::make($request->all(),[

            'badge_type' => 'required|in:monthly,yearly',
        ]);

        if($validator->fails()) {
        
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors(),

            ], 422);
        }

        $user = $request->user();
        

        if($user) {

          $user->badge_type = $request->badge_type;
        

          if($user->save()) {

            return response()->json([
                'status' => true,
                'message' => 'Badge Type Selected Successfully',
              ], 200);
            

          }else {

            return response()->json([
                'status' => false,
                'message' => 'Badge Type Submission Failed',
              ], 400);
            


          }

         

        } else {

            return response()->json([
                'status' => false,
                'message' => 'Bio-Form Must Be Completed First',
              ], 404);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    // Store user verification details
    public function store(Request $request)
    {
       
    }





    public function showApproved(Request $request) {

        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');

        $approvedUsers = User::with('payment')->where('verify_status', 1);

        if($search) {
            $approvedUsers->where(function($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                       ->orWhere('username', 'like', "%$search%" )
                       ->orWhere('email', 'like', "%$search%" )
                       ->orWhere('address', 'like', "%$search%" );
                       
            });


        }

        $users = $approvedUsers->paginate($perPage);

        return response()->json([
            'status' => true,
            'message' => 'Approved Users  Fetched Successfully',
            'users' => $users->items(),
            'total' => $users->total(),
            'filtered_total' => $users->total(),
        ],200);
        

    }

    public function showRejectedUser(Request $request) {

        
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');


        $rejectedUsers = User::with('payment')->where('verify_status', -1);

        if($search) {
            $rejectedUsers->where(function($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                       ->orWhere('username', 'like', "%$search%" )
                       ->orWhere('email', 'like', "%$search%" )
                       ->orWhere('address', 'like', "%$search%" );
                       
            });


        }


        $users = $rejectedUsers->paginate($perPage);

        return response()->json([
            'status' => true,
            'message' => 'Rejected Users  Fetched Successfully',
            'users' => $users->items(),
            'total' => $users->total(),
            'filtered_total' => $users->total(),
        ],200);
        




       

    }


    /**
     * Verify the specified resource.
     */
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
