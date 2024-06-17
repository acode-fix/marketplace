<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auditlog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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
    public function create()
    {
        //

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

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
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

        //    if(!Auth::attempt($request->only(['email', 'password']))){
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Email and password does not match',
        //     ], 401);
        //    }

           $user = User::where('email', $request->email)->first();
           if(!$user)
             {

                return response()->json([
                    'status' => false,
                    'message' => 'email is not found',

                ], 401);
             }

           $token = $user->createToken(env('APP_NAME'))->plainTextToken;

          // $user = Auditlog::getLog();
            // AuditLog::storeAudith()
           return response()->json([
            'status' => true,
            'message' => 'User Logged in successfully',
            'data' => ['token'=>$token],
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
    public function accountSettings(string $id, Request $request)
    {
        //
        try {

            $validateUser = Validator::make($request->all(), [

                'name' => 'required',
                'username' => 'string|max:255|unique:users,username,' . $user->id,
                // 'email' => 'string|email|max:255|unique:users,email,' . $user->id,
                'phone_number' => 'required',
                'whatsapp' => 'required',
                'address' => 'required',
                'bio' => 'string|nullable',
               'photo_url' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:300',
               'location' => 'string|max:255|nullable',
                'stage' => 'required',
                'is_verified' => 'boolean|nullable',
                'shop_id' => 'string|nullable',
                'badge_type' => 'in:monthly,yearly|nullable',
                'badge_expiry' => 'date|nullable',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

        //$userDetails = Auth::user();  // To get the logged-in user details
            $user = User::find($id);  // Find the user using model and hold its reference
            $user->name=$request->input('name');
            $user->username=$request->input('username');
            $user->phone=$request->input('phone_number');
            $user->whatsapp=$request->input('whatsapp');
            $user->address=$request->input('address');
            $user->bio=$request->input('bio');
            $user->location=$request->input('location');
            $user->stage=$request->input('stage');
            $user->is_verified=$request->input('is_verified');
            $user->shop_id=$request->input('shop_id');
            $user->badge_type=$request->input('badge_type');
            $user->badge_expiry=$request->input('badge_expiry');

        //  $validatedData = array_filter($validateUser->getData());

        // $user = User::find($id);
        // $user =  $user->update($validatedData);

        $imageName = null;
    if (request()->hasFile('photo_url')) {
        $file = request()->file('photo_url');
        $imageName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move('./uploads/users/', $imageName);

        $user->photo_url=$imageName;
    }


            $user->save();  // Update the data

            return response()->json([
                'status' => true,
                'message' => 'User Updated Succesfully',
                'review' => $user,
            ], 200);
        }

            catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
