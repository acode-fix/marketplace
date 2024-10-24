<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auditlog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Barryvdh\Debugbar\Facades\Debugbar;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getUserData()
    {
        // $user =  auth('sanctum')->user()->id;
        //     $user = User::find($id);  // Find the user using model and hold its reference
        $user = Auth::user(); // Get the authenticated user
        return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        try{
        //
        $validator = Validator::make($request->all(), [
             'email' => 'required|email|unique:users,email',
             'password' => 'required|min:6|confirmed',
             'password' => 'required|min:6',

        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 401);
        }
        $shopToken = Shop::shopToken(50);
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'shop_token' => $shopToken,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);

    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }

    }


    /**
     * Login The User
     * @param Request $request
     * @return User
    */
    public function loginUser(Request $request)
    {
        try {
            //
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',

           ]);

           if($validator->fails()){
               return response()->json([
                   'status' => false,
                   'message' => 'validation error',
                   'errors' => $validator->errors()
               ], 401);
           }

           if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json([
                'status' => false,
                'message' => 'Email and password does not match with our record',
            ], 401);
           }

           $user = User::where('email', $request->email)->first();
           if(!$user)
             {

                return response()->json([
                    'status' => false,
                    'message' => 'email is not found',

                ], 401);
             }

           $token = $user->createToken(env('APP_NAME','defaultAppName'))->plainTextToken;

          // $user = Auditlog::getLog();
            // AuditLog::storeAudith()
           return response()->json([
            'status' => true,
            'message' => 'User Logged in successfully',
            'data' => ['token'=>$token, 'user' => $user]

        ], 200);


        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function  adminLogin(Request $request) {

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required', 

        ]);
    

        if($validator->fails()) {

            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'error' => $validator->errors()

            ], 422);
        }

    

        if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json([
                'status' => false,
                'message' => 'Email and password does not match with our record',
            ], 401);
           }

           $user = $request->user();

           $userType = $user->user_type;

          // Debugbar::info($request->user());


      // Debugbar::info($user);
      // Debugbar::info($user->user_type);

       if($userType !== 1) {

        return response()->json([
            'status' => false,
            'message' => 'Unauthorized Access',

        ], 403);
        

       }else if ($userType === 1) {

        $token = $request->user()->createToken(env('APP_NAME','defaultAppName'))->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'You Have Logged In Successfully',
            'token' => $token,

        ],200);

       }



        


    }

    /**
     * Display the specified resource.
     */
    public function view(Request $request)
    {
        //
        try {
            //code...
                //$user = User::find($id);
                $user = User::all();

                return response()->json([
                    'status' => true,
                    'Detail of all users' =>  $user,
                ], 200);



        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function accountSettings( Request $request)
    {
        //
        try {

            $validateUser = Validator::make($request->all(), [

                // 'name' => 'required',
                'username' => 'required|max:255|unique:users,username,',
                'phone_number' => 'required',
                'bio' => 'required',
               'photo_url' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
               'location' => 'string|max:255|nullable',
               // 'whatsapp' => 'required',
                // 'address' => 'required',
                // 'stage' => 'required',
                // 'is_verified' => 'boolean|nullable',
                // 'shop_id' => 'string|nullable',
                // 'badge_type' => 'in:monthly,yearly|nullable',
                // 'badge_expiry' => 'date|nullable',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 422);
            }

            $id =  auth('sanctum')->user()->id;
            $user = User::find($id);  // Find the user using model and hold its reference
            // $user->name=$request->input('name');
            $user->username=$request->input('username');
            $user->phone_number=$request->input('phone_number');
            $user->bio=$request->input('bio');
            $user->location=$request->input('location');
            // $user->whatsapp=$request->input('whatsapp');
            // $user->address=$request->input('address');
            // $user->stage=$request->input('stage');
            // $user->is_verified=$request->input('is_verified');
            // $user->shop_id=$request->input('shop_id');
            // $user->badge_type=$request->input('badge_type');
            // $user->badge_expiry=$request->input('badge_expiry');

        //  $validatedData = array_filter($validateUser->getData());

        // $user = User::find($id);
        // $user =  $user->update($validatedData);

        $imageName = null;
    if (request()->hasFile('photo_url')) {
        $file = request()->file('photo_url');
        $imageName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move('./uploads/users/', $imageName);

    }
             $user->photo_url=$imageName;
            $user->save();  // Update the data

            return response()->json([
                'status' => true,
                'message' => 'User Updated Succesfully',
                'review' => $user,
            ], 200);
        }

            catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
    }
}


   public function uploadBanner(Request $request) {

    $validator = Validator::make($request->all(), [
        'banner' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        'photo_url' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
    ]);

    if($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'validation error',
            'errors' => $validator->errors(),
        ]);
    }

    if ($request->hasFile('banner')) {

        $bannerImg = $request->File('banner');  
        $rad =  mt_rand(1000, 9999);
      
        $bannerName =  md5($bannerImg->getClientOriginalName()) . mt_rand(000, 999) . '.' . $bannerImg->getClientOriginalExtension();


        $bannerImg->move(public_path('./uploads/users/'), $bannerName);
    
    }

    $userId = $request->user()->id;

    $user = User::findorfail($userId);

    if($request->hasFile('photo_url')){
        $photo_url = $request->file('photo_url');
        $rad = mt_rand(1000,9999);

        $photoName = md5($photo_url->getClientOriginalName()) . $rad . '.' . $photo_url->getClientOriginalExtension();

        $photo_url->move(public_path('./uploads/users/'), $photoName);

        $photoUpload =  $photoName;

        $user->photo_url = $photoUpload;

        if ( $user->save()) {

            return response()->json([
                'status' => true,
                'message' => 'Profile Picture Updated Successfully',
                'data' => $user,
            ],200);
        
           } else {
        
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                
            ],500);

    }
}
   
    $user->banner = $bannerName;

    if ( $user->save()) {

    return response()->json([
        'status' => true,
        'message' => 'Banner Image Updated Successfully',
        'data' => $user,
    ],200);

   } else {

    return response()->json([
        'status' => false,
        'message' => 'Something went wrong',
        
    ],500);

    
   }





   }

   public function uploadProfileImage(Request $request) {

    log::info($request->all());

    return response()->json([

        'status' => true,
        'message' => 'test'

    ], 200);

   }


    // public function getReferralLink(Request $request)
    // {
    //     $user = Auth::user();

    //     if (!$user->referral_code) {
    //         $user->referral_code = $user->generateReferralCode();
    //        $user->save();
    //     }

    //     $referralLink = url('/join/bas-mrk-pla?ref=' . $user->referral_code);

    //     return response()->json(['referralLink' => $referralLink]);
    // }

    public function showSellerShop($userId)
{
    $user = User::with('products')->findOrFail($userId);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    return response()->json($user);
}


    /**
     * Log out the user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logoutUser(Request $request)
    {
        try {
            $user = $request->user(); // Get the authenticated user;        

            if ($user) {
                // Get the user's token and revoke it
                $user->currentAccessToken()->delete();

                return response()->json([
                    'status' => true,
                    'message' => 'User logged out successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'User not authenticated',
                ], 401);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteAccount(Request $request)
{
    try {
        
        $user = Auth::user();

        if (!$user) {

            return response()->json([
                'status' => false,
                'message' => 'User not authenticated',
            ], 401);
        }

        
        $user->tokens()->delete(); 
        $user->delete();

        return response()->json([
            'status' => true,
            'message' => 'User account deleted successfully',
        ], 200);

    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }






}


public function getUserPayment(Request $request) {

    $userId = $request->user;

    $user = User::with('payment')->where('user_type', 2)->where('id', $userId)->first();

    DeBugBar::info($user, $userId);

    if($user) {

        return response()->json([
            'status' => true,
            'message' => 'User Details Fetched Successfuly',
            'data' => $user,

        ], 200);
    }else {


        return response()->json([
            'status' => false,
            'message' => 'User Not Found',
            
        ],404);
    }

}


public function getDetails(Request $request) {

   
   $userId = $request->query('userId');
   $shopNo = $request->query('shopNo');

   if($userId) {

   $user = User::with('products')->where('id', $userId)->where('verify_status', 1)
                                     ->where('badge_status', 1)
                                     ->whereNotNull('shop_token')
                                     ->first();

    if(!$user) {

        return response()->json([
            'status' => false,
            'message' => 'Shop Verification Failed',

        ],404);

    }else {

        Debugbar::info($user);

        return response()->json([
            'status' => true,
            'message' => 'User Details Fetched Successfully',
            'data' => $user,

        ]);

        

    }

  }

  if($shopNo) {

    debugbar::info($shopNo);

    $user = User::query()->where('shop_no', $shopNo)
                         ->whereNotNull('shop_token')
                         ->first();

    if(!$user) {

        return response()->json([
            'status' => false,
            'message' => 'Invalid Shop Number',

        ],404);

    }else {
    
        Debugbar::info($user);

        return response()->json([
            'status' => true,
            'message' => 'User Details Fetched Successfully',
            'data' => $user->id,

        ]);

            
    
    }

    

  }



}


public function getLink(Request $request) {

  if(!$request->user()) {
    return response()->json([
        'status' => false,
        'message' => 'User Not authenticated',


    ],404);
  }

   //Debugbar::info(env('APP_URL'));

   $url = config('app.url');

   return response()->json([
    'status' => true,
    'message' => 'App url fetched successfully',
     'url' => $url,

   ]);

}

public function getUserId(Request $request) {

   $userId = $request->user()->id;

   Debugbar::info($userId);

}


































}
