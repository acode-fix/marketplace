<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Ads_categoryController;
use App\Models\Product;
use App\Models\Ads_category;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Ads_Category::all();
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    }
    public function show($id)
    {
        return view('other_frontend.category_search', ['categoryId' => $id]);
    }

    /**
     * Display the specified resource.
     */
    public function view(string $id)
    {
        //
        $category =  Categories::find($id);

        return response()->json([
          'status' => true,
          'message' => 'category details',
          'data' => $category,
      ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function list(string $id, Request $request)
    {
        //

       // $product = Product::find($id);
        $category =  Categories::find($id);
        $categorylist =  Product::with('user')->where('category_id',$category->id)->get();


      return response()->json([
        'status' => true,
        'message' => 'list of Categories products',
        'data' => $categorylist,
        'category' => $category->name, // Include the category name
    ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function search($search)
    {
        //
        $category = Categories::where('name', 'LIKE', '%' . $search . '%')->get();

        return response()->json([
            'status' => true,
            'message' => 'Search Categories',
            'data' => $category,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
