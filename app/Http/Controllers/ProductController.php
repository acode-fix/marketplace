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

    // public function index()
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


//     if ($totalProducts <= 15) {

//        return response()->json($data);

//     } else if ($totalProducts > 15) {
//         $numberOfProductsToDisplay = 15;
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
    $numberOfProductsToDisplay = 15;

    if ($totalProducts <= $numberOfProductsToDisplay) {
        $products = Product::all();
    } else {
        $randomIndices = [];
        while (count($randomIndices) < $numberOfProductsToDisplay) {
            $randomIndex = rand(0, $totalProducts - 1);
            if (!in_array($randomIndex, $randomIndices)) {
                $randomIndices[] = $randomIndex;
            }
        }
        $products = Product::whereIn('id', $randomIndices)->get();
    }

    // Fetch advertisements
    $ads = Advertisement::all();

    // Convert to arrays for easier manipulation
    $productsArray = $products->toArray();
    $adsArray = $ads->toArray();

    // Merge advertisements into the product list at random positions
    foreach ($adsArray as $ad) {
        $randomPosition = rand(0, count($productsArray));
        array_splice($productsArray, $randomPosition, 0, [$ad]);
    }

    return response()->json($productsArray);
}



//
public function getProductDetails($id)
{
    // Fetch the product details from the database using the provided ID
    $productDetails = Product::find($id);

    // Check if the product exists
    if (!$productDetails) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    return response()->json($productDetails);
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
        $query = Product::query();

        if ($request->has('condition') && $request->condition !== '') {
            $query->where('condition', $request->condition);
        }

        if ($request->has('location') && $request->location !== '') {
            $query->where('location', $request->location);
        }

        if ($request->has('verified_seller') && $request->verified_seller) {
            $query->where('verified_seller', true);
        }

        $products = $query->get();

        return response()->json($products);

    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('Error filtering products: ' . $e->getMessage());

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
            'condition' => ['required','in:used,new'],
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
                    'message' => 'Product deleted successfully',
                ], 200);
              }else {
                return response()->json([
                    'status' => false,
                    'message' => 'un-enable to delete product',
                ], 500);
              }
    }
}
