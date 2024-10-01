<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Verification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Barryvdh\Debugbar\Facades\Debugbar;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        Debugbar::info($user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function bioForm(Request $request) {

        $validator = Validator::make($request->all(),[

            'email' => 'required|email',
            'nationality' => 'required|string',
            'name' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|in:male,female',
            'phone_number' => 'required|string',
            

        ]);


        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation errror',
                'errors' => $validator->errors(),

            ],422);
        }

        $user = $request->user();
        $user->id;

      $verification = Verification::updateOrCreate([
        'user_id' => $user->id,
      ], [
        'email' => $request->email,
        'nationality' => $request->nationality,
        'name' => $request->name,
        'address' => $request->address,
        'gender' => $request->gender,
        'phone_number' => $request->phone_number,

      ]);

      

      if($verification) {

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
            $user->id;
    
            $verification = Verification::where('user_id', $user->id)->first();
    
            if($verification) {
    
                $verification->nin_file = $ninFileName;
                $verification->save();
    
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

        $verification = Verification::where('user_id', $user->id)->first();

        if($verification) {

            $verification->selfie_photo = $selfieName;
            $verification->save();

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
        $user->id;
         
        $verification = Verification::where('user_id', $user->id)->first();

        if($verification) {

          $verification->badge_type = $request->badge_type;
          $verification->save();

          if($verification->save()) {

            return response()->json([
                'status' => true,
                'message' => 'Badge Type Selected Successfully',
              ], 200);
            


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

    // Method to approve verification (for admins)
    public function approve($id)
    {
        $verification = Verification::findOrFail($id);
        $verification->approved = true;
        $verification->save();

        return response()->json(['status' => true, 'message' => 'Verification approved.']);
    }


    /**
     * Verify the specified resource.
     */
public function approveVerification(Request $request, $userId)
{
    // Fetch the user's verification record
    $verification = Verification::where('user_id', $userId)->first();

    if (!$verification) {
        return response()->json(['error' => 'Verification record not found'], 404);
    }

    // Update the verification status (assuming it's passed)
    $verification->approved = true;
    $verification->save();

    // Update the is_verified field in the users table
    $user = User::find($userId);

    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    $user->is_verified = true;
    $user->save();

    return response()->json(['message' => 'User verification approved and updated successfully.']);
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
