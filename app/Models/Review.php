<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function product() {
        return $this->belongsTo(Product::class);
        
    }


    public function user() {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public static function avgProductRating($id) {

         $reviews = Review::where('product_id', $id)->get();

         $totalRating = $reviews->sum('rate');
         $totalReview = $reviews->count();

         $avgRating = $totalRating / $totalReview;



         return $avgRating;
        
    }


   

    // /**
    //  * Get the product that owns the review.
    //  */
    // public function product()
    // {
    //    return $this->belongsTo(Product::class);
    // }

    // /**
    //  * Get the user that made the review.
    //  */
    // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }
//     static function getReviewByUser($user_id){
//         return Review::where(['user_id'=>$user_id])->get();

//     }
//     static function getComment($comment){
//         return  Review::where(['comment'=>$comment])->get();
//   }



//     static function getAllUserReview($id){
//         return  Reviewers::find($id);
//   }
}
