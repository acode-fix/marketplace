<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
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
    public function store(Request $request)
    {
        //
        try{
        $validateProduct = Validator::make($request->all(), [

            'user_id' => 'required',
            'title' => 'required',
           'image_url' => 'required|image|mimes:jpg,jpeg,png,gif|max:300',
            'description' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'location' => 'required',
            'actual_price' => 'required',
            'promo_price' => 'required',
            'condition' => ['required','in:used,new'],
            'price_status' => ['required','in:cash_price,negotiable'],
        ]);

       if($validateProduct->fails()){
           return response()->json([
               'status' => 'error',
               'message' => 'validation error',
               'errors' => $validateProduct->errors()
           ], 401);
       }

       $product = Product::create([
        'user_id' => $request->user_id,
            'title' => $request->title,
            //'image_url' => $request->image_url,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'location' => $request->location,
            'actual_price' => $request->actual_price,
            'promo_price' => $request->promo_price,
            'condition' => $request->condition,
            'price_status' => $request->price_status,
    ]);

    $imageName = null;
    if (request()->hasFile('image_url')) {
        $file = request()->file('image_url');
        $imageName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move('./uploads/products/', $imageName);

        $product->image_url = $imageName;
        $product->save();

    }


    return response()->json([
        'status' => 'success',
        'message' => 'Product saved successfully',
    ], 200);



} catch (\Throwable $th) {
    return response()->json([
        'status' => false,
        'message' => $th->getMessage()
    ], 500);
}
    }

    /**
     * Display the specified resource.
     */
    public function view(string $id)
    {
        //
        $product =  Product::find($id);
      //$product =  ['products'=> $product ];

      return response()->json([
        'status' => 'success',
        'message' => 'products',
        'data' => $product,
    ], 200);
    }

    /**
     * Display User of a product.
     */
     public function showUser(string $id)
    {
        //
        $user = User::find($id);
        $productuser =  Product::where('user_id',$user->id)->get();

          //  ::where('user_id',$user_id)
             //  ::where(['user_id'=>$user_id,''])
                //::whereUserId($user_id)->get();

      return response()->json([
        'status' => 'success',
        'message' => 'products',
        'data' => $productuser,
    ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // $product =  Product::find($id);
        // $data =  ['products'=> $product ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
        //
        $validateProduct = Validator::make($request->all(), [

            'user_id' => 'required',
            'title' => 'required',
           'image_url' => 'required|image|mimes:jpg,jpeg,png,gif|max:300',
            'description' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'location' => 'required',
            'actual_price' => 'required',
            'promo_price' => 'required',
            'condition' => ['required','in:used,new'],
            'price_status' => ['required','in:cash_price,negotiable'],
        ]);

       if($validateProduct->fails()){
           return response()->json([
               'status' => 'error',
               'message' => 'validation error',
               'errors' => $validateProduct->errors()
           ], 401);
       }

       $validatedData = array_filter($validateProduct->getData());

    $product = Product::find($id);
    $prd =  $product->update($validatedData);

    $imageName = null;
    if (request()->hasFile('image_url')) {
        $file = request()->file('image_url');
        $imageName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move('./uploads/products/', $imageName);

        $product->image_url = $imageName;
        $product->save();

    }

             return response()->json([
        'status' => 'success',
        'message' => 'Product updated successfully',
    ], 200);


} catch (\Throwable $th) {
    return response()->json([
        'status' => 'error',
        'message' => $th->getMessage()
    ], 500);
}

    }



    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        $product = Product::find($id);
        $prd =  $product->delete();

              if($prd){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Product updated successfully',
                ], 200);
              }else {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'un-enable to delete product',
                ], 500);
              }
    }
}
