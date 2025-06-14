<?php

namespace App\Http\Controllers;

use App\Services\UserProductListingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserProductListingController extends Controller
{   
    public function __construct(public UserProductListingService $userProductListingService)
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
     {
   

    }

    public function getUserWithProducts(Request $request)
    {     
          $perPage = $request->input('per_page', 10);
          $searchParams = $request->input('search');

         $users = $this->userProductListingService->getUserWithProducts(perPage: $perPage, searchParams: $searchParams);

         return response()->json([
            'status' => true,
            'message' => 'User fetched',
            'users' => $users->items(),
            'total' => $users->count(),
            'filtered_total' => $users->total(),

         ], 200);

    }


    public function getUserWithNoProducts(Request $request)
    {    
         $perPage = $request->input('per_page', 10);
          $searchParams = $request->input('search');

          $users = $this->userProductListingService->getUserWithNoProducts(perPage: $perPage, searchParams: $searchParams);
          
            return response()->json([
            'status' => true,
            'message' => 'User fetched',
            'users' => $users->items(),
            'total' => $users->count(),
            'filtered_total' => $users->total(),

         ], 200);

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
