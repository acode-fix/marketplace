<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Validator;
use Barryvdh\Debugbar\Facades\Debugbar;
use Symfony\Component\ErrorHandler\Debug;

class PasswordResetController extends Controller
{
    //

        public function sendResetOtp(Request $request)
        {
            $request->validate(['email' => 'required|email']);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json(['message' => 'Invalid Email Address'], 404);
            }

            // Generate a random OTP
            $otp = rand(100000, 999999);
            

            // Store the OTP in the password_resets table
            DB::table('password_resets')->updateOrInsert(
                ['email' => $request->email],
                [
                    'email' => $request->email,
                    'token' => $otp,
                    'created_at' => Carbon::now()
                ]
            );


            Mail::to($request->email)->send(new OtpMail($otp));

            // Mail::raw('Your OTP is: ' . $otp, function ($message) use ($request) {
            //     $message->to($request->email)->subject('Reset Password OTP');
            // });

            // In a real scenario, you would send the OTP via email
            // For testing, we return it in the response
            return response()->json(['message' => 'OTP sent to your email', 'otp' => $otp, ]);
        }

        public function verifyOtp(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'otp' => 'required|numeric'
            ]);

            $record = DB::table('password_resets')->where([
                ['email', '=', $request->email],
                ['token', '=', $request->otp]
            ])->first();

            if (!$record) {
                return response()->json(['message' => 'Invalid OTP'], 400);
            }

            return response()->json(['message' => 'OTP verified']);
        }

        public function resetPassword(Request $request)
        {
        
            $validate = Validator::make($request->all(), [

                'otp' => 'required|numeric',
               'password' => 'required|min:8|confirmed',

            ]);

            if($validate->fails()) {

                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validate->errors(),

                ],422);
            }



            $record = DB::table('password_resets')->where([
               // ['email', '=', $request->email],
                ['token', '=', $request->otp]
            ])->first();

            $record->email;

            if (!$record) {
                return response()->json(['message' => 'Invalid OTP'], 400);
            }

            $user = User::where('email', $record->email)->first();
            $user->password = Hash::make($request->password);
            $user->save();

            // Delete the record from password_resets table
            DB::table('password_resets')->where(['email' => $record->email])->delete();

            return response()->json(['message' => 'Password reset successfully']);
        }
}
