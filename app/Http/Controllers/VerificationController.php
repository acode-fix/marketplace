<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Verification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VerificationController extends Controller
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
    // Store user verification details
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'nationality' => 'required|string',
            'name' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|in:male,female',
            'phone_number' => 'required|string',
            'nin_file' => 'required|file|mimes:jpeg,png,pdf',
            // 'selfie_photo' => 'required|file|mimes:jpeg,png',
            'selfie_photo' => 'required|string', // Base64 string
            'badge_type' => 'required|in:monthly,yearly',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Handle file uploads
        $ninFile = null;
        if ($request->hasFile('nin_file')) {
            $file = $request->file('nin_file');
            $ninFile = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/nins/', $ninFile);
        }

        // Handle selfie photo upload (Base64 to file)
                $selfiePhoto = null;
            if ($request->has('selfie_photo')) {
                // Get base64 string
                $imageData = $request->input('selfie_photo');

                // Remove data URL part (e.g., "data:image/jpeg;base64,")
                $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
                $imageData = str_replace(' ', '+', $imageData);
                // Decode base64 string to binary data
                $image = base64_decode($imageData);
                // Create a unique filename for the selfie photo
                $selfiePhoto = md5(time()) . '.jpg';
                // Ensure the directory exists
                $selfiePhotoPath = './uploads/selfiePhotos/';
                if (!file_exists($selfiePhotoPath)) {
                    mkdir($selfiePhotoPath, 0777, true); // Create directory if it does not exist
                }

                // Save the image
                file_put_contents($selfiePhotoPath . $selfiePhoto, $image);
            }

        if ($selfiePhoto === null) {
            return response()->json([
                'status' => false,
                'errors' => 'Selfie photo upload failed.'
            ], 422);
        }

       // Check if the user already has a verification record
    $verification = Verification::updateOrCreate(
        ['user_id' => Auth::id()],
        [
            'email' => $request->email,
            'nationality' => $request->nationality,
            'name' => $request->name,
            'address' => $request->address,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'nin_file' => $ninFile,
            'selfie_photo' => $selfiePhoto,
            'badge_type' => $request->badge_type,
            'approved' => false,
        ]
    );

        return response()->json([
            'status' => true,
            'message' => 'Verification details submitted successfully.'
        ], 201);
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
