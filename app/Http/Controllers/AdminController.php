<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('user_type', '=', 2 )->get();

        if(!$users->isEmpty()) {

            return response()->json([
                'status' => true,
                'message' => 'Registered Users Fetched Successfully',
                'users' => $users,

            ], 200);

        }


        return response()->json([
            'status' => false,
            'message' => 'No Registered Users',

        ], 404);




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
    public function store(Request $request, $id)
    {    
        $user = User::find($id);

        if(!$user) {

            return response()->json([
                'status' => false,
                'message' => 'User Not Found',
    
            ], 404);
    

        }


        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string',
            'username' => 'nullable|max:255|unique:users,username,'.$user->id,
            'phone_number'=> ['nullable', 'regex:/^(080|091|090|070|081)[0-9]{8}$/'],
            'address' => 'nullable',
            'email' => 'nullable|email|unique:users,email,'.$user->id,
            'nationality' => 'nullable|string',
            'bio' => 'nullable|string',
            'gender' => 'nullable|in:male,female',
            'photo_url' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:1024',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:1024',
            'selfie_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:1024',
            'nin_file' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:1024',

        ]);

        

        
        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors(),

            ],422);
        }

        

        $validatedData = $validator->validated();

        debugbar::info($validatedData);

        $uploads = [

            'photo_url' => '/uploads/users',
            'banner' => '/uploads/users',
            'selfie_photo' => '/uploads/selfiePhotos',
            'nin_file' => 'uploads/nins'

        ];

        foreach ($uploads as $file => $path) {

            if($request->hasFile($file)) {

                $uploadedFile = $this->handleFileUpload($request->file($file), $path);

                if(!$uploadedFile) {
                    return response()->json([
                        'status' => false,
                        'message' => ucfirst(str_replace('_', '', $file )) . 'Upload Failed!!',

                    ],500);
                }

                $validatedData[$file] = $uploadedFile;
            }

        }


    

           if($user->update($validatedData)) {

            return response()->json([
                'status' => true,
                'message' => 'User Profile Update Successfully',

            ]);
           }



            return response()->json([
                'status' => false,
                'message' => 'User Profile Update Failed',

            ],500);

    }

    public function handleFileUpload($file, $path) {


            $rad = mt_rand(1000, 9999);

            $fileName = md5($file->getClientOriginalName()) . $rad . '.' .$file->getClientOriginalExtension();

            $upload =  $file->move(public_path($path), $fileName);

            return $upload ? $fileName : null;

    }


    public function suspend(Request $request) {

        $userId = $request->suspendUserId;

        debugbar::info($userId);

        $user = User::find($userId);

        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User Not Found',

            ], 404);
        }

        $user->user_type = -2;

        if($user->save()) {

            return response()->json([
                'status' => true,
                'message' => 'User Suspended Successfully',

            ], 200);
        };



        return response()->json([
            'status' => false,
            'message' => 'User Suspend Failled!!'

        ], 500);



        




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
         debugbar::info($id);

         $user = User::find($id);

         if($user) {

            return response()->json([
                'status' => true,
                'message' => 'User Fetched Successfully',
                'user' => $user,

            ],200);

         }


         return response()->json([
            'status' => false,
            'message' => 'User Not Found',


         ],400);




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
        $user = User::find($id);

        if(!$user) {

            return response()->json([
                'status' => false,
                'message' => 'User Not Found',

            ], 404);
        }

        if($user->delete()) {

            $user->tokens()->delete();


            return response()->json([
                'status' => true,
                'message' => 'User Deleted Successfully',

            ],200);


        }


        return response()->json([
            'status' => false,
            'message' => 'User Failed To Delete!!',

        ],500);





  
    }













}
