<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shop;
use App\Models\Review;
use App\Models\ProductEngagementLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auditlog;
use App\Models\Product;
use App\Models\UserProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Notifications\ReviewPushNotification;
use App\Services\UserService;
use App\Traits\HasApiResponse;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    use HasApiResponse;

    public function __construct(protected UserService $userService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function getUser()
    {
        $user = Auth::user();

        if (!$user) {
            return $this->notFoundResponse(message: 'User not found');
        }

        return $this->successResponse(
            message: 'User fetched successfully',
            data: ['user' => $user],
            statusCode: Response::HTTP_OK
        );
    }




    /**
     * Show the form for creating a new resource.
     */
    public function getUserData()
    {

        $user = Auth::user(); // Get the authenticated user
        return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        try {
            //
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
                'password' => 'required|min:6',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validator->errors()
                ], 401);
            }
            $shopToken = Shop::shopToken(50);
            $shop_no = Shop::shopNo();

            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'shop_token' => $shopToken,
                'shop_no' => $shop_no,
                'role_id'  => 3,
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
                'rememberMe' => 'nullable|boolean',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validator->errors()
                ], 422);
            }



            $user = User::withTrashed()->where('email', $request->email)->first();

            if (!$user) {

                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Email Or password',

                ], 404);
            }


            if ($user->trashed()) {

                return response()->json([
                    'status' => false,
                    'message' => 'Your account has been deleted',

                ], 401);
            }


            if ($user->user_type == -2) {

                return response()->json([
                    'status' => false,
                    'message' => 'Account Suspendend!!'

                ], 403);
            }


            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Email or Password',
                ], 401);
            }


            $token = $user->createToken(env('APP_NAME', 'Api Token'))->plainTextToken;

            $emailCookie = null;
            $passwordCookie = null;

            if ($request->rememberMe) {

                $emailCookie = cookie('email', $request->email, 60 * 24, '/', null, false, false);
                $passwordCookie = cookie('password', $request->password, 60 * 24, '/', null, false, false);
            }


            $response = response()->json([
                'status' => true,
                'message' => 'User Logged in successfully',
                'data' => ['token' => $token, 'user' => $user,]

            ]);


            if ($emailCookie) {

                $response->cookie($emailCookie);
            }

            if ($passwordCookie) {

                $response->cookie($passwordCookie);
            }

            return $response;
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    public function getUserByShop($shopToken)
    {

        $user = User::where('shop_token', $shopToken)->first();

        if (!$user) {

            return  $this->notFoundResponse(
                message: 'User not found',
            );
        }

        if ($user->user_type == -2) {

            return $this->errorResponse(
                message: 'Your account has been suspended!!',
                statusCode: Response::HTTP_FORBIDDEN,
            );
        }

        return $this->successResponse(
            message: 'User fetched successfully',
            statusCode: Response::HTTP_OK,
            data: ['user' => $user]
        );
    }






    public function  adminLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',

        ]);


        if ($validator->fails()) {

            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'error' => $validator->errors()

            ], 422);
        }



        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => false,
                'message' => 'Email or password does not match with our record',
            ], 401);
        }

        $user = User::with('role')->where('user_type', 1)
            ->where('email', $request->email)
            ->first();

        $userType = $user->email;

        $email = $request->email;

        if ($email === $userType) {

            $token = $request->user()->createToken(env('APP_NAME', 'defaultAppName'))->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'You Have Logged In Successfully',
                'token' => $token,
                'adminUser' => $user,

            ], 200);
        } else {

            return response()->json([
                'status' => false,
                'message' => 'Unauthorized Access',

            ], 403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function view(Request $request)
    {
        //
        try {

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
    public function accountSettings(Request $request)
    {
        try {



            $validateUser = Validator::make($request->all(), [

                'username' => 'nullable|max:255|unique:users,username,' . $request->user()->id,
                'phone_number' => ['nullable', 'regex:/^(080|091|090|070|081)[0-9]{8}$/'],
                'bio' => 'nullable|string',
                'photo_url' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:1024',
                'shop_address' => ['nullable', 'string', 'max:255'],
                'business_location' => ['nullable', 'string'],


            ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 422);
            }

            $isEmpty =  $this->checkForEmptyRequest($request);

            if ($isEmpty) {

                return  $this->errorResponse(
                    message: 'At least one field must be filled',
                );
            }


            $id =  $request->user()->id;

            $user = User::find($id);


            $fields = ['username', 'phone_number', 'bio', 'shop_address', 'business_location'];

            $input = collect($request->only($fields))->map(function ($value) {
                return is_string($value) ? trim($value) : $value;
            })->filter(function ($value) {

                return $value !== null && $value !== '';
            })->all();

            $user->update($input);



            $imageName = null;
            if (request()->hasFile('photo_url')) {
                $file = request()->file('photo_url');
                $imageName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./uploads/users/', $imageName);

                $user->photo_url = $imageName;

                $user->save();
            }




            return response()->json([
                'status' => true,
                'message' => 'User Updated Succesfully',
                'review' => $user,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    public function checkForEmptyRequest(Request $request)
    {
        return collect($request->all())->every(fn($val) => empty($val));
    }



    public function uploadBanner(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'banner' => 'image|mimes:jpg,jpeg,png,gif,svg|max:1024',
            'photo_url' => 'image|mimes:jpg,jpeg,png,gif,svg|max:1024',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        if ($request->hasFile('banner')) {

            $bannerImg = $request->File('banner');
            $rad =  mt_rand(1000, 9999);

            $bannerName =  md5($bannerImg->getClientOriginalName()) . mt_rand(000, 999) . '.' . $bannerImg->getClientOriginalExtension();


            $bannerImg->move(public_path('./uploads/users/'), $bannerName);
        }

        $userId = $request->user()->id;

        $user = User::findorfail($userId);

        if ($request->hasFile('photo_url')) {
            $photo_url = $request->file('photo_url');
            $rad = mt_rand(1000, 9999);

            $photoName = md5($photo_url->getClientOriginalName()) . $rad . '.' . $photo_url->getClientOriginalExtension();

            $photo_url->move(public_path('./uploads/users/'), $photoName);

            $photoUpload =  $photoName;

            $user->photo_url = $photoUpload;

            if ($user->save()) {

                return response()->json([
                    'status' => true,
                    'message' => 'Profile Picture Updated Successfully',
                    'data' => $user,
                ], 200);
            } else {

                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong',

                ], 500);
            }
        }

        $user->banner = $bannerName;

        if ($user->save()) {

            return response()->json([
                'status' => true,
                'message' => 'Banner Image Updated Successfully',
                'data' => $user,
            ], 200);
        } else {

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',

            ], 500);
        }
    }

    public function uploadProfileImage(Request $request)
    {

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
            $user = $request->user();

            if ($user) {

                // if(method_exists(auth()->user()->currentAccessToken(), 'delete')) {
                //     auth()->user()->currentAccessToken()->delete();
                // }

                if (method_exists($user->currentAccessToken(), 'delete')) {
                    $user->currentAccessToken()->delete();
                }

                auth()->guard('web')->logout();

                return response()->json([
                    'status' => true,
                    'message' => 'User logged out successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Log out failed',
                ], 401);
            }
        } catch (\Throwable $th) {

            Log::error(($th->getMessage()));

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

            $validator = Validator::make($request->all(), [
                'deletion_reason' => 'required|string',
            ]);

            if ($validator->fails()) {

                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors(),

                ], 422);
            }

            $user = $request->user();

            if (!$user) {

                return response()->json([
                    'status' => false,
                    'message' => 'User not authenticated',
                ], 401);
            }

            // Product::where('user_id', $user->id)->update(['deleted_at' => now()]);

            $user->products()->update(['deleted_at' => now()]);

            $user->deletion_reason = $request->deletion_reason;
            $user->save();
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


    public function getUserPayment(Request $request)
    {

        $userId = $request->user;

        //  $user = User::with('payment')->where('user_type', 2)->where('id', $userId)->first();

        $user = User::with('payment')->where('id', $userId)->withTrashed()->first();

        DeBugBar::info($user, $userId);

        if ($user) {

            return response()->json([
                'status' => true,
                'message' => 'User Details Fetched Successfuly',
                'data' => $user,

            ], 200);
        } else {

            return response()->json([
                'status' => false,
                'message' => 'User Not Found',

            ], 404);
        }
    }


    public function getDetails(Request $request)
    {


        $userId = $request->query('userId');
        $shopNo = $request->query('shopNo');




        if ($userId) {

            /*     $user = User::with('products')->where('id', $userId)->where('verify_status', 1)
                                            ->where('badge_status', 1)
                                            ->whereNotNull('shop_token')
                                            ->whereHas('products', function($query) {
                                                $query->where('quantity', '!=', 0);
                                            })->first();  */

            //new flow where all users have sellers shop
            $user = User::with('products')->where('id', $userId)
                ->whereNotNull('shop_token')
                ->whereHas('products', function ($query) {
                    $query->where('quantity', '!=', 0);
                })->first();



            if (!$user) {
                // debugbar::info($userId);

                /* $user = User::where('id', $userId)->where('verify_status', 1)
                                    ->where('badge_status', 1)
                                    ->whereNotNull('shop_token')
                                    ->first();  */

                //new flow where all users have sellers shop
                $user = User::where('id', $userId)
                    ->whereNotNull('shop_token')
                    ->first();

                debugbar::info($user);

                if (!$user) {

                    return response()->json([
                        'status' => false,
                        'message' => 'User is Unverified',


                    ], 404);
                } else {

                    return response()->json([
                        'status' => true,
                        'message' => 'User is verified but does not have  Product listed',
                        'data' => $user,

                    ], 200);
                }
            }


            return response()->json([
                'status' => true,
                'message' => 'Verified User Details Fetched Successfully',
                'data' => $user,

            ]);
        }



        if ($shopNo) {

            debugbar::info($shopNo);

            $user = User::query()->where('shop_no', $shopNo)
                ->whereNotNull('shop_token')
                ->first();

            if (!$user) {

                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Shop Number',

                ], 404);
            } else {

                Debugbar::info($user);

                return response()->json([
                    'status' => true,
                    'message' => 'User Details Fetched Successfully',
                    'data' => $user->id,

                ]);
            }
        }


        return response()->json([
            'status' => false,
            'message' => 'User verification failed',
        ], 400);
    }





    public function getLink(Request $request)
    {

        if (!$request->user()) {
            return response()->json([
                'status' => false,
                'message' => 'User Not authenticated',


            ], 404);
        }

        //Debugbar::info(env('APP_URL'));

        $url = config('app.url');

        return response()->json([
            'status' => true,
            'message' => 'App url fetched successfully',
            'url' => $url,

        ]);
    }

    public function getUserId(Request $request)
    {

        $user = $request->user();

        Debugbar::info($user);

        return response()->json([
            'status' => true,
            'message' => 'ID fetched successfully',
            'user' => $user,

        ], 200);
    }

    public function sendNotification(Request $request)
    {


        $pendingConnects =  ProductEngagementLog::where('status', 0)->get();

        foreach ($pendingConnects as $connect) {

            $productConnectId = $connect->product_id;

            $userId = $connect->user_id;

            $user = User::findOrFail($userId);

            //$productId = Product::find($productConnectId);

            $product = Product::where('id', $productConnectId)
                ->where('quantity', '!=', 0)
                ->first();

            if (!$product) {
                continue;
            }

            $user->notify(new ReviewPushNotification($userId, $product->id, $product->user_id,  'You connected with this product'));

            $connect->status = 1;
            $connect->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Notifications sent successfully',
        ], 200);
    }


    public function storeProductRequest(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'input' => 'required|string',

        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'errors' => $validator->errors(),

            ], 422);
        }


        $user_id = $request->user()->id;


        $storeRequest = UserProductRequest::create([

            'user_id' => $user_id,
            'request' => $request->input,


        ]);



        if ($storeRequest) {

            return response()->json([
                'status' => true,
                'message' => 'Request saved successfully'

            ], 200);
        }



        return response()->json([
            'status' => false,
            'message' => 'Request was not saved',

        ], 500);
    }


    public function getUsersWithOutShopNo(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');

        $users =  $this->userService->getUsersWithOutShopNo(perPage: $perPage, search: $search);

        return response()->json([
            'status' => true,
            'message' => 'User fetched',
            'users' => $users->items(),
            'total' => $users->total(),
            'filtered_total' => $users->total(),

        ], 200);
    }


    public function genShopNo($userId)
    {

        $user  =  $this->userService->findUserById(userId: $userId);

        if (!$user) {
            return $this->notFoundResponse(message: 'User not found');
        }

        $user = $this->userService->generateUserShopNo(user: $user);

        if (!$user) {
            return $this->errorResponse(message: 'User shop no update failed', statusCode: Response::HTTP_INTERNAL_SERVER_ERROR);
        }


        return $this->successResponse(
            message: 'User shop no updated successfully',
            statusCode: Response::HTTP_OK,
            data: ['data' => $user],
        );
    }
}
