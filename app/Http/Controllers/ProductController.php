<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Product::all();
        return response()->json($data);

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

            'user_id' => 'required|exists:users,id',
            // 'shop_id' => 'required|exists:shops,id',
            'title' => 'required',
           'image_url' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required',
            'location' => 'required',
            'actual_price' => 'required',
            'promo_price' => 'required',
            'condition' => ['required','in:used,new'],
            // 'price_status' => ['required','in:cash_price,negotiable'],
            // 'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

       if($validateProduct->fails()){
           return response()->json([
               'status' => false,
               'message' => 'validation error',
               'errors' => $validateProduct->errors()
           ], 401);
       }

       $product = Product::create([
        'user_id' => $request->user_id,
        // 'shop_id' => $request->shop_id,
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'location' => $request->location,
            'actual_price' => $request->actual_price,
            'promo_price' => $request->promo_price,
            'condition' => $request->condition,
            // 'price_status' => $request->price_status,
            'image_url' => json_encode([]), // Initialize with an empty array
]);


$imageNames = [];

// Step 2: Check if the request has files and debug the files array
if ($request->hasFile('image_url')) {
    $files = $request->file('image_url');

    // Ensure $files is an array
    if (!is_array($files)) {
        $files = [$files];
    }

    // Debugging: Log the structure of the files array
    \Log::info('Image Files Count:', ['count' => count($files)]);

    foreach ($files as $file) {
        // Additional debugging to check each file
        \Log::info('Processing File:', ['originalName' => $file->getClientOriginalName(), 'isValid' => $file->isValid()]);

        if (!$file->isValid()) {
            \Log::error('Invalid file detected', ['file' => $file->getClientOriginalName()]);
            continue;
        }

        $imageName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/products/'), $imageName);
        $imageNames[] = $imageName;
    }

    // Debugging: Log the image names array
    \Log::info('Processed Image Names:', $imageNames);

    // Debugging: Check if image names are being collected
    if (empty($imageNames)) {
        return response()->json([
            'status' => false,
            'message' => 'No images were processed'
        ]);
    }

    // Step 3: Update the product's image_url field with all processed image names
    $product->image_url = json_encode($imageNames);
    $product->save();
} else {
    // Debugging: No files found in the request
    return response()->json([
        'status' => false,
        'message' => 'No image files found in the request'
    ]);
}

// Step 4: Return the response with the updated product
return response()->json([
    'status' => true,
    'message' => 'Product created successfully',
    'data' => $product
]);



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
        'status' => true,
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
        'status' => false,
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
               'status' => false,
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
        'status' => true,
        'message' => 'Product updated successfully',
    ], 200);


} catch (\Throwable $th) {
    return response()->json([
        'status' => false,
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
                    'status' => true,
                    'message' => 'Product updated successfully',
                ], 200);
              }else {
                return response()->json([
                    'status' => false,
                    'message' => 'un-enable to delete product',
                ], 500);
              }
    }
}
