<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ProductController extends Controller
{

    // public function index2()
    // {
    //     $products = Product::orderByRaw('RAND()')->take(10)->get();
    //    return response()->json($products);

    // //    $data = Product::all();
    // //    return response()->json($data);

    // }


//     public function index()
// {
//        $data = Product::all();
//     // Step 1: Count the total number of products
//     $totalProducts = Product::count();


//     if ($totalProducts <= 16) {

//        return response()->json($data);

//     } else if ($totalProducts > 16) {
//         $numberOfProductsToDisplay = 16;
//         $randomIndices = [];

//         while (count($randomIndices) < $numberOfProductsToDisplay) {
//             $randomIndex = rand(0, $totalProducts - 1);
//             if (!in_array($randomIndex, $randomIndices)) {
//                 $randomIndices[] = $randomIndex;
//             }
//         }

//         // Step 4: Fetch the products using the generated random indices
//         // This assumes your Product model's primary key is `id`
//         $randomProducts = Product::whereIn('id', $randomIndices)->get();


//         // Step 5: Return the random products as JSON
//         return response()->json($randomProducts);

//     } else {
//         return response()->json([]);
//     }

// }
public function index()
{
    $totalProducts = Product::count();

    if ($totalProducts <= 16) {
        // Fetch all products with user data
       // $data = Product::with('user:id,is_verified')->get();
       $data = Product::with('user')->get();
        return response()->json($data);
    } else {
        $numberOfProductsToDisplay = 16;

        // Fetch a random set of products
        $randomProducts = 
       // Product::with('user:id,is_verified')
       Product::with('user')
                                 ->inRandomOrder()
                                 ->limit($numberOfProductsToDisplay)
                                 ->get();

        return response()->json($randomProducts);
    }
}



//
public function getProductDetails($id) {

    $product = Product::with('user')->find($id);

    if (!$product) {
        return response()->json([
            'status' => false,
            'message' => 'Product not found',
        ], 404);
    }

    if ($product) {


        return response()->json([
            'status' => true,
            'message' => 'User Products Fetched Successfully',
            'product' => $product,

        ]);
        // return response()->json([
        //     'id' => $product->id,
        //     'title' => $product->title,
        //     'description' => $product->description,
        //     'location' => $product->location,
        //     'image_url' => $product->image_url,
        //     'ask_for_price' => $product->ask_for_price,
        //     'promo_price' => $product->promo_price,
        //     'actual_price' => $product->actual_price,
        //     'quantity' => $product->quantity,
        //     'condition' => $product->condition,
        //     'isUserVerified' => $product->user->is_verified, // Include user verification status
        //     'sellerId' => $product->user->id // Include seller ID
        // ]);
    } else {
        return response()->json([
            'status' => false,
            'message' => 'Product not found'
        ], 404);
    }
}

    /**
     * Show the form for creating a new resource.
     */
//     public function filterProducts(Request $request)
// {
//     $query = Product::query();

//     if ($request->has('condition')) {
//         $query->where('condition', $request->input('condition'));
//     }

//     if ($request->has('verified_seller')) {
//         // Assuming 'verified_seller' is a field in the User model associated with the product
//         $query->whereHas('user', function ($q) use ($request) {
//             $q->where('verified_seller', $request->input('verified_seller'));
//         });
//     }

//     if ($request->has('location')) {
//         $query->where('location', $request->input('location'));
//     }

//     $filteredProducts = $query->get();
//     // Log::info('Filter parameters', $request->all());
//     // Log::info('Filtered products', $filteredProducts->toArray());

//     return response()->json($filteredProducts);
// }
public function filterProducts(Request $request)
{
    try {

        $query = Product::with('user');

        if ($request->has('condition') && $request->condition !== '') {
            $query->where('condition', $request->condition);
            
        }

        if ($request->has('location') && $request->location !== '') {

            $location = $request->location;
            $query->where('location', $location);
        }

        if ($request->has('verifyStatus') && $request->verifyStatus !== '') {

            $status = $request->verifyStatus;
            $query->whereHas('user', function($q) use ($status){
                $q->where('verify_status', $status);

            });
            
        }

      
        $products = $query->get();

        DebugBar::info($request->condition, $location,  $status, $products);

        return response()->json($products);

    } catch (\Exception $e) {
        // Log the error for debugging
        Log::error('Error filtering products: ' . $e->getMessage());

        // Return error response
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
        $validateProduct = Validator::make($request->all(), [

            // 'user_id' => 'required|exists:users,id',
            // 'shop_id' => 'required|exists:shops,id',
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required',
            'location' => 'required',
            // 'actual_price' => 'required',
            // 'promo_price' => 'required',
            'condition' => ['required','in:fairly_used,new'],
            // 'price_status' => ['required','in:cash_price,negotiable'],
           'ask_for_price' => 'required|boolean',
            'image_url' => 'required',
        'image_url.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

         // Conditionally add validation rules for actual_price and promo_price
         $validateProduct->sometimes('actual_price', 'required', function ($input) {
            return !$input->ask_for_price;
        });

        $validateProduct->sometimes('promo_price', 'required', function ($input) {
            return !$input->ask_for_price;
        });

       if($validateProduct->fails()){
           return response()->json([
               'status' => false,
               'message' => 'validation error',
               'errors' => $validateProduct->errors()
           ], 401);
       }
      // log::info($request->user()->id);

       $product = Product::create([
           'user_id' => $request->user()->id,
        // 'shop_id' => $request->shop_id,
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'location' => $request->location,
            'actual_price' => $request->ask_for_price ? null : $request->actual_price,
             'promo_price' => $request->ask_for_price ? null : $request->promo_price,
            // 'actual_price' => $request->actual_price,
            // 'promo_price' => $request->promo_price,
            'condition' => $request->condition,
            'ask_for_price' => $request->ask_for_price,
            'image_url.*' => json_encode([]), // Initialize with an empty array
]);

// dd($product);

$imageNames = [];

// Step 2: Check if the request has files and debug the files array
if ($request->hasFile('image_url')) {
    $files = $request->file('image_url');
    if (!is_array($files)) {
        $files = [$files];
    }

    // Debugging: Log the structure of the files array
    Log::info('Image Files Count:', ['count' => count($files)]);

    foreach ($files as $file) {
        // Additional debugging to check each file
        Log::info('Processing File:', ['originalName' => $file->getClientOriginalName(), 'isValid' => $file->isValid()]);

        if (!$file->isValid()) {
            Log::error('Invalid file detected', ['file' => $file->getClientOriginalName()]);
            continue;
        }

        $imageName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/products/'), $imageName);
        $imageNames[] = $imageName;
    }

    // Debugging: Log the image names array
    Log::info('Processed Image Names:', $imageNames);

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
    public function getProduct(string $id)
    {
    
        $product =  Product::find($id);

        if($product) {

            return response()->json([
                'status' => true,
                'message' => 'products',
                'data' => $product,
            ], 200);
        


        }else {

            return response()->json([
                'status' => false,
                'message' => 'Product Not Found',
            
            ], 404);


        }
    

     
    }

    /**
     * Display User of a product.
     */
    public function showUser(string $id)
{
    try {
        $user = User::findOrFail($id); // Use findOrFail to automatically handle 404 if user is not found

        $products = Product::where('user_id', $user->id)->get();

        return response()->json([
            'status' => true,
            'message' => 'User and products',
            'data' => [
                'user' => $user,
                'products' => $products,
            ],
        ], 200);
    } catch (\Exception $e) {
        // Log the exception or return a proper error response
        return response()->json([
            'status' => false,
            'message' => 'Failed to fetch user details: ' . $e->getMessage(),
        ], 500);
    }
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



public function update(Request $request, $id) {

    $validator = Validator::make($request->all(),[
        'title' => 'required|string',
        'description' => 'required | string',
        'quantity'  => 'required|numeric',
        'location' => 'required',
        'condition' => ['required','in:fairly_used,new'],
        'actual_price' => 'required|numeric',
        'promo_price' => 'required|numeric',
        'image_url' => 'required|array', 
        'image_url.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',

    ]);

    if($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation Error',
            'errors' => $validator->errors(),
        ],422);


    }
    

    if($request->has('image_url')) {

        $files = $request->file('image_url');
        if (!is_array($files)) {
            $files = [$files];
        }

        $imageNames = [];
       
        foreach ($files as $file) {

            $imageName = md5($file->getClientOriginalName() ) . mt_rand(000, 999) . "." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products/'), $imageName);
            $imageNames[] = $imageName;
        }

       // Log::info($imageNames);
        

    }



  $userId  = $request->user()->id;

  $product = Product::find($id);
  
  $product->user_id = $userId;
  $product->title = $request->input('title');
  $product->description = $request->input('description');
  $product->quantity = $request->input('quantity');
  $product->location = $request->input('location');
  $product->actual_price = $request->input('actual_price');
  $product->promo_price = $request->input('promo_price');
  $product->condition = $request->input('condition');
  $product->image_url = json_encode($imageNames);

  $product->save();

  if($product->save()) {

    return response()->json([
        'status' => true,
        'message' => 'Product Details Updated Successfully',

    ],200);
  }else {

    return response()->json([
        'status' => false,
        'message' => 'Something Went Wrong!!',

    ],500);


  }



}


public function searchProducts(Request $request) {

  $search = $request->searchParams;

  if(!$search) {

    return response()->json([
        'status' => false,
        'message' => 'Invalid Search Input',

    ], 404);
  }


   $products =  Product::with('user')->where(function($query) use ($search) {
      $query->where('title', 'LIKE', "%{$search}%")
      ->orWhere('description', 'LIKE', "%{$search}%")
      ->orWhere('location', 'LIKE', "%{$search}%");
               
   })->get();

      

        if($products) {

            DebugBar::info($products);

            return response()->json([
                'status' => true,
                'message' => 'Product Fetched Successsfully',
                'products' => $products,

            ], 200);
        }



}

public function loadSharedProduct($link) {

    return view('other_frontend.shared-product-link');

}

public function getProductLink(Request $request) {

 $id = $request->productId;

 $product = Product::with('user')->find($id);

 if(!$product) {
    return response()->json([
        'status' => true,
        'message' => 'No Product Found',

    ],404);

 }

 $user = $product->user;

 $shopToken = $user->shop_token;
 $shopNo = $user->shop_no;
 $url = env('APP_URL');
 $encode = Shop::shopToken(100);
 $decoy = Str::random(40);


 return response()->json([
    'status' => true,
    'data' => [
    'id' => $id,
    'shopToken' => $shopToken,
    'shopNo' => $shopNo,
    'encode' => $encode,
    'url' => $url,
    'decoy' => $decoy,]

 ],200);


}

public function getSharedProductDetails(Request $request) {

    $id = $request->id;
    $shopToken = $request->shopToken;

    $product = Product::with('user')->where('id', $id)
                       ->whereHas('user', function($query) use($shopToken) {
                        $query->where('shop_token', $shopToken);

    })->first();

    if(!$product) {
        return response()->json([
            'status' => false,
            'message' => 'Product Not Found'


        ], 404);

    }

    $userId = $product->user_id;

    $otherProducts = Product::with('user')->where('user_id', $userId)->get();

        return response()->json([
            'status' => true,
            'message' => 'Product Fetched Successfully',
            'products' => [
                'singleProduct' => $product,
                'otherProduct' => $otherProducts,
            ]

        ],200);
    


}

    /**
     * Update the specified resource in storage.
     */

/*

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
            'condition' => ['required','in:fairly_used,new'],
            'price_status' => ['required','in:cash_price,negotiable'],
        ]);

       if($validateProduct->fails()){
           return response()->json([
               'status' => false,
               'message' => 'validation error',
               'errors' => $validateProduct->errors()
           ], 422);
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
*/

    // FOR PRODUCT SEARCH
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform search query
        $products = Product::where('title', 'like', "%$query%")
                            ->orWhere('description', 'like', "%$query%")
                            ->orWhereHas('category', function ($q) use ($query) {
                                $q->where('name', 'like', "%$query%");
                            })
                            ->get();

        return response()->json($products);
    }

        public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('other_frontend.product_des', compact('product'));
    }


// This gets the details of the seller which is a user and other products
// associated with the user
    public function getSellerDetails($productId)
    {
        // Find the product by ID
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Get the seller details
        $seller = $product->user;

        // Get other products by the same seller
        $otherProducts = Product::where('user_id', $seller->id)
                                ->where('id', '!=', $productId)
                                ->get();

        return response()->json([
            'seller' => $seller,
            'products' => $otherProducts
        ]);
    }


    public function getProductsBySeller($sellerId)
{
    $products = Product::where('user_id', $sellerId)->get();
    return response()->json($products);
}

    /**
     * This part works for the product listing in Shop.blade.php
     * Display a listing of the products posted by the authenticated user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProducts()
    {
        try {
            $user = auth()->user(); // Ensure this is not null
            if (!$user) {
                return response()->json(['message' => 'User not authenticated'], 401);
            }

            $products = Product::with('user')->where('user_id', $user->id)->get();
            return response()->json([
                    'status' => true,
                    'message' => 'Product Listed',
                    'data' => $products,
                ], 200);
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error("Error fetching user products: ".$e->getMessage());

            // Return a generic error message to the client
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //log::info($id);
        
        $product = Product::find($id);

       $prd =  $product->delete();

              if($prd){
                return response()->json([
                    'status' => true,
                    'message' => 'Product deleted successfully',
                ], 200);
              }
            
           else {
                return response()->json([
                    'status' => false,
                    'message' => 'Unable to delete product',
                    
                ], 500);
              }

              
        return response()->json([
            'status' => false,
            'message' => 'Product Not Found'

        ],404);
              
    }
}