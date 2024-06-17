<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Learn;
use Illuminate\Support\Facades\Validator;


class LearnController extends Controller
{
    //Sample
    public function getLearnData()
    {
       // Fetch all learn items from the database
       $data = Learn::all();

       return response()->json($data);
    }

    //
    public function index()
    {
        // return Learn::all();
       $data = Learn::all();

       return response()->json($data);

    }

    public function show($id)
    {
        return Learn::findOrFail($id);
    }

   
    public function store(Request $request)
    {
        //
        try{
            $request->validate([
                'title' => 'required|string|max:255',
                'url' => 'required|url',
                'description' => 'required|string', // Ensure this rule exists
            ]);

       $learn = Learn::create([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
    ]);

    //   config('app.gateway_url');

    return response()->json([
        'status' => true,
        'message' => 'Video saved successfully',
    ], 200);



} catch (\Throwable $th) {
    return response()->json([
        'status' => false,
        'message' => $th->getMessage()
    ], 500);
}
    }

    public function update(Request $request, $id)
    {
        $learn = Learn::findOrFail($id);
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'url' => 'sometimes|url',
            'description' => 'sometimes|string',
        ]);

        $learn->update($request->all());
        return $learn;
    }

    public function destroy($id)
    {
        Learn::destroy($id);
        return response()->json(['message' => 'Video deleted successfully'], 204);
    }
}
