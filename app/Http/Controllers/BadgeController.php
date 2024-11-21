<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Badge;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Log;
use Carbon\CarbonImmutable;
use Carbon\Carbon;

class BadgeController extends Controller
{

   public function checkBadgeStatus(Request $request) {

     $userId = $request->user()->id;

      $status = User::find($userId);

      if(!$status) {

        return response()->json([
            'status' => false,
            'message' => 'User Not Found',


        ],404);
      }

      if(!$status->expiry_date && $status->verify_status === 0) {
        
        log::info(['message' => 'not yet verify']);

        return response()->json([
            'status' => true,
            'message' => 'Not Yet Verify',
            'badge' => $status,

        ],200);
      }

      if($status->verify_status === -2) {

        log::info(['message' => 'pending approval']);

        return response()->json([
            'status' => true,
            'message' => 'Pending Approval',
            'badge' => $status,

        ],200);
      }


     $expiryDate = carbon::parse($status->expiry_date);
     $currentDate = Carbon::now();


     if($currentDate > $expiryDate && $status->badge_status === -1) {

        return  response()->json([
            'status'=> false,
            'message' => 'Badge Expired',
            'badge' => $status,

        ], 200);
        
     }else if($currentDate <= $expiryDate  && $status->badge_status === 1) {

        return  response()->json([
            'status'=> true,
            'message' => 'Active Badge',
            'badge' => $status,

        ], 200);
     }


   }



 public function verifyBadge() {


  $expiredBadges = User::where('expiry_date', '<', Carbon::now())->get();
  

  log::info($expiredBadges);


  if($expiredBadges->isEmpty()) {

        return response()->json([
            'status' => false,
            'message' => 'No Badge Found',

        ]);
    
  }

  foreach($expiredBadges as $expire) {

        $expire->badge_status = -1;
        $expire->save();

    return response()->json([
        'status' => true,
        'message' => 'All expired badges processed successfully',

    ]);

   


  }



    



   }




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
