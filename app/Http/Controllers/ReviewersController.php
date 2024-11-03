<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class ReviewersController extends Controller
{

    public function loadRatingContent(Request $request) {

        $validator = Validator::make($request->all(), [

            'userId' => 'required|exists:users,id',
            'productId' => 'required|exists:products,id',
            'shopToken' => 'required|exists:users,shop_token',

        ]);

        if($validator->fails())  {

            return response()->json([
                'status' => false,
                'message' => 'validation failed',
                'errors' => $validator->errors(),

            ],422);
        }

        $productId = $request->productId;
        //$userId = $request->userId;
        $shopToken = $request->shopToken;


        $user = $request->user()->id;

        $getUser = User::where('id', $user)->where('shop_token', $shopToken)->first();

        $getProduct = Product::with('user')->where('id', $productId)->first();

       // debugbar::info($getProduct);

       if($getProduct) {

        return response()->json([
            'status' => true,
            'message' => 'product fetched successfully',
            'user' => $getUser,
            'products' => $getProduct,

        ],200);

       }


       return response()->json([
        'status' => false,
        'message' => 'product not found',

       ],404);











    }



 public function store(Request $request) {

       // debugbar::info($request->all());

        $validator = Validator::make($request->all(),[
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'comment' => 'required|string',
            'rate' => 'required|numeric|min:0|max:5',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation failed',
                'errors' => $validator->errors(),

            ],422);


        }

       $productRated = Product::with('user')->where('id', $request->product_id)->first();

       $user_id = $request->user()->id;

       $review = Review::create([
          'user_id' => $productRated->user_id,
          'reviewer_id' => $user_id,
          'product_id' => $request->product_id,
          'comment' => $request->comment,
          'rate' => $request->rate,
        ]);

        if($review)  {


                $product = Product::getProduct($request->product_id);

                if($product && $product->quantity > 0) {

                    $quantity = ($product->quantity - 1);
                    $sold =  ($product->sold + 1 );

                    $avgProductRating = Review::avgProductRating($request->product_id);

                    $product->update([
                        'quantity' => $quantity,
                        'sold' => $sold,
                         'avg_rating' => $avgProductRating,

                    ]);

                }

                

                $notifications = Notification::where('notifiable_id', $request->user_id)
                                            ->where('data->product_id', $request->product_id)
                                            ->orderBy('id', 'desc')->get();



                if(!$notifications->isEmpty()) {

                        foreach($notifications as $notification) {
                            $notification->read_at = now();
                            $notification->save();

                        
                        }

                        return response()->json([
                            'status' => true,
                            'message' => 'Notification marked as read and Review saved successfully',
            
                        ], 200);
                    
                }

                return response()->json([
                    'status' =>false,
                    'message' => 'No Match found for the notification',

                ], 404);




        }



        return response()->json([
            'status' => false,
            'message' => 'Review Failed to save',

        ], 500);


       




 }

 

 public function loadReviewPage(Request $request) {

  $validator = Validator::make($request->all(), [
    'user_id' => 'required|',
    'shop_token' => 'required|exists:users,shop_token',

  ]);

  if($validator->fails()) {

    return response()->json([
        'status' => false,
        'message' => 'validation failed',
        'errors' => $validator->errors(),

    ],422);

  }

  //$userId = $request->user()->id;

  $userId = $request->user_id;

  $reviews =  Review::where('user_id', $userId)->get();

  //debugbar::info($reviews);

  if(!$reviews->isEmpty()) {

    $totalReview =  $reviews->count();
    $totalRating = $reviews->sum('rate');

    $star5 = $reviews->where('rate', 5)->count(); 
    $star4 = $reviews->where('rate', 4)->count();
    $star3 = $reviews->where('rate', 3)->count();
    $star2 = $reviews->where('rate', 2)->count();
    $star1 = $reviews->where('rate', 1)->count();

                    //   foreach ($reviews as $key => $review) {
                    
                    //     $totalRating += $review->rate;
                    //     $totalReview ++;
                    
                    //   }


  
    $averageRatingPerUser =  $totalReview > 0  ?  $totalRating / $totalReview  : 0; 
  

    
    $user = Product::with('user')->where('user_id', $userId)->get();


    $productReviews = Product::with(['reviews', 'reviews.user'])->where('user_id', $userId)->get();
  
    //debugbar::info($totalReview, $totalRating, $averageRating, $products);

      return response()->json([
        'status' => true,
        'productReviews' => $productReviews,
        'avgRating' => $averageRatingPerUser,
        'user' => $user,
        'totalReview' => $totalReview,
        'rate' => [1 => $star1, 
                   2 => $star2,
                   3 => $star3,
                   4 => $star4,
                   5 => $star5,
        ]

      ],200);

    }    else  {

        $user = Product::with('user')->where('id', $userId)->get();

        if($user->isEmpty()) {
        
            $user = User::find($userId);
     
            return response()->json([
                'status' => true,
                'message' => 'No Review Found',
                'user' =>  $user,
                'avgRating' => 0,
                'rate' => [],
                'productReviews' => [],

            ],200);



        }

    




   }


   

   }

   public function avgReview(Request $request) {

    $userId = $request->userId;

    //debugbar::info($userId);

    $validator = Validator::make($request->all(),[
        'userId' => 'required|exists:users,id',

    ]);


        if($validator->fails()) {

            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'errors' => $validator->errors(),

            ]);

        }

    $reviews =  Review::where('user_id', $userId)->get();


    
        if(!$reviews->isEmpty()) {

            $totalReview =  $reviews->count();
            $totalRating = $reviews->sum('rate'); 

            $averageRatingPerUser =  $totalReview > 0  ?  $totalRating / $totalReview  : 0; 


            return response()->json([
                'status' => true,
                'message' => 'Average review fetched successfully',
                'avgRating' => $averageRatingPerUser,

            ],200);


         }


    return response()->json([
        'status' => true,
        'message' => 'empty Review',
        'avgRating' => 0,

    ],200);



}






       





















    



    }
