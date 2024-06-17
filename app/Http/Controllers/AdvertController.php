<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Advert;
use Illuminate\Support\Facades\Storage;


class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $query = Advert::with('categories');

    if ($request->has('category')) {
        $query->whereHas('categories', function ($q) use ($request) {
            $q->where('id', $request->category);
        });
    }

    if ($request->has('user')) {
        $query->where('user_id', $request->user);
    }

    $adverts = $query->get();
    return response()->json($adverts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $advertTypes = Ads_category::all();
        return view('advert.create', compact('ads_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      try{
         $request->validate([
            'image_url' => 'required|image|max:2048', // 2MB Max
            'amount' => 'required',
            'duration' => 'required',
            'rate' => 'required',
            'points_earned' => 'required',
            'ads_status' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'ads_category_id' => 'required|exists:ads_categories,id'
        ]);

        $duration = \Carbon\Carbon::parse($request->start_date)->diffInDays($request->end_date);
        $price = $this->calculatePrice($duration);

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('public/adverts');
        }

        $advert = new Advert([
            'user_id' => auth()->id(),
            'ads_category_id' => $request->ads_category_id,
            'image_url' => $image_url,
            'amount' => $request->amount,
            'duration' => $request->duration,
            'rate' => $request->rate,
            'points_earned' => $request->points_earned,
            'ads_status' => $request->ads_status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $price,
        ]);

        $advert->save();

        return response()->json([
            'message' => 'Advert created successfully!',
             'advert' => $advert,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }

    }

    private function calculatePrice($days)
    {
        // $rate = 10.00; // This could be dynamic or fetched from config or database
        // return $days * $rate;
        $type = Ads_category::find($request->advert_type_id);
        $days = (new \DateTime($request->start_date))->diff(new \DateTime($request->end_date))->days + 1;
        $price = $days * $type->price;

        return response()->json([
            'price' => $price
        ]);
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
    public function update(Request $request, Advert $advert)
    {
        //
        $this->authorize('update', $advert);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        // other fields as necessary
    ]);

    $advert->update($validated);
    return response()->json($advert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->authorize('delete', $advert);

    $advert->delete();
    return response()->json(['message' => 'Advert deleted successfully']);
    }
}
