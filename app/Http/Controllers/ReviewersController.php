<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
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
        $userId = $request->userId;
        $shopToken = $request->shopToken;


        $getProduct = Product::with('user')->where('id', $productId)
                             ->where('user_id', $userId)->whereHas('user', function($query) use ($shopToken) {
                             $query->where('shop_token', $shopToken);

        })->first();

       // debugbar::info($getProduct);

       if($getProduct) {

        return response()->json([
            'status' => true,
            'message' => 'product fetched successfully',
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

       $review = Review::create([
          'user_id' => $request->user_id,
          'product_id' => $request->product_id,
          'comment' => $request->comment,
          'rate' => $request->rate,
        ]);

        if($review)  {

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




       


























/*




    public function store(Request $request, Product $product)
    {
        //
        try {
            //code...
          //  $yourToken = $request->bearerToken();

           //$token = \Laravel\Sanctum\PersonalAccessToken::findToken($yourToken);
       // return $token;

        //  $user_id = $token->tokenable_id;

        $validateReviewer = Validator::make($request->all(), [
            'product_id' => 'required',
            'comment' => 'required|string',
            'rate' => 'required|numeric|min:0|max:5',

        ]);
        if($validateReviewer->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateReviewer->errors()
            ], 401);
        }


             $prod =  Product::getProduct($request->product_id);
             $reviewer_id = User::getAuthUser()->id;

        $reviewers = Reviewers::create([
            'user_id' => $prod->user_id,
            'reviewer_id' => $reviewer_id,
            'product_id' => $request->product_id,
            'comment' => $request->comment,
            'rate' => $request->rate,

        ]);
        // $reviewers->save();

        return response()->json([
            'status' => true,
            'message' => 'Review Added',
            'rate' => $reviewers,
        ], 200);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }

    }
        */

     /**
     * Show the form for editing the specified resource.
     */

     /*
    public function view(string $id)
    {
        //

        $reviewers =  Reviewers::find($id);

        return response()->json([
          'status' => true,
          'message' => 'review',
          'rate' => $reviewers,
      ], 200);
    }
      */
        /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @param  \App\Reviewers  $reviewers
     * @return \Illuminate\Http\Response
     */

     /*
    public function update(Request $request, Product $product, Reviewers $reviewers, string $id)
    {
        try{
        $validateReviewer = Validator::make($request->all(), [
            'product_id' => 'required',
            'comment' => 'required|string',
            'rate' => 'required|numeric|min:0|max:5',

        ]);



       if($validateReviewer->fails()){
           return response()->json([
               'status' => false,
               'message' => 'validation error',
               'errors' => $validateReviewer->errors()
           ], 401);
       }

       $validatedData = array_filter($validateReviewer->getData());

    $reviewers = Reviewers::find($id);
    $review =  $reviewers->update($validatedData);

             return response()->json([
        'status' => true,
        'message' => 'Review Updated',
        'review' => $reviewers
    ], 200);


} catch (\Throwable $th) {
    return response()->json([
        'status' => false,
        'message' => $th->getMessage()
    ], 500);
}
    }


    */
    /**
     * Display the specified resource.
     */

     /*
    public function viewUserMetric($id)
    {
        //
        // $reviewers = Reviewers::where('user_id', 'rate');
        // $data = $reviewers->with('rate')->get();
        // return $data->rate->avg('rate');
       // $reviewers = Reviewers::where(['user_id'=>$user_id])->get();
       $reviewers =  Reviewers::getReviewByUser($id);

        $data = [];
        if($reviewers->isNotEmpty()){
            $r =   $sumRate = 0;
            foreach($reviewers as $rv){

                $r++;
              $sumRate += $rv->rate;

            }
               $avg = (($sumRate)/($r*5)*5);

             return response()->json([
                'status' => true,
                'rate' =>  round($avg, 2),
            ], 200);

        }

        }

        */

        /**
     * Display the specified resource.
     */

     /*
        public function allUserMetric(Reviewers $reviewers)
    {
        //
    $users = User::all();

    $data = [];
             $c = 0;
        foreach ($users as $user) {

        $data[$c]['id']  = $user->id;
        $data[$c]['name']  = $user->name;

    $reviewers =  Reviewers::getReviewByUser($user->id);

    // $allreview = Reviewers::with('user_id')->get();

         if($reviewers->isNotEmpty()){
             $r =   $sumRate = 0;
             foreach($reviewers as $rv){

                 $r++;
               $sumRate += $rv->rate;

             }
                $avg = (($sumRate)/($r*5)*5);

         }else
             $avg = 0;

             $data[$c]['rate']  = round($avg,2);
                 $c++;
        }


        return response()->json([
            'status' => true,
            'data' =>  $data,
        ], 200);


        }

        */

        /**
     * Display the specified resource.
     */

     /*
    public function allUserComment(Reviewers $reviewers)
    {
        $users = User::all();

    $data = [];
             $c = 0;
        foreach ($users as $user) {

        $data[$c]['id']  = $user->id;
        $data[$c]['name']  = $user->name;

   $reviewers =  Reviewers::getReviewByUser($user->id);

   if($reviewers->isNotEmpty()){
    $r =   $com = 0;
    foreach($reviewers as $rv){

        $r++;
      $com = $rv->comment;

    }
       $comment = $com;

}else
    $comment = 0;

             $data[$c]['comment']  = $comment;
                 $c++;
        }


        return response()->json([
            'status' => true,
            'data' =>  $data,
        ], 200);

        }

        */

        /**
     * Suspend the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @param  \App\Reviewers  $reviewers
     * @return \Illuminate\Http\Response
     */


     /*
    public function suspend(Reviewers $reviewers)
    {
        if (auth()->user()->id !== $reviewers->user_id) {
            return response()->json(['message' => 'User suspended']);
        }
        $reviewers->suspend();
        return response()->json(null, 204);

    }

    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @param  \App\Reviewers  $reviewers
     * @return \Illuminate\Http\Response
     */


     /*
    public function delete(Reviewers $reviewers)
    {
        if (auth()->user()->id !== $reviewers->user_id) {
            return response()->json(['message' => 'Action Forbidden']);
        }
        $reviewers->delete();
        return response()->json(null, 204);
    }

   */
    



    }


