<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'description', 'category_id', 'quantity',
        'location', 'actual_price', 'promo_price', 'condition', 'image_url'
    ];

    protected $casts = [
        'image_url' => 'json'
    ];

    // /**
    //  * Get the reviews of the product.
    //  */
    // public function reviews()
    // {
    //     return $this->hasMany('App\Reviewers');
    // }

    // /**
    //  * Get the user that added the product.
    //  */
    // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }



    static function getProduct($id){
          return  Product::find($id);
    }

    public function getAverageRatingAttribute()
    {
        return $this->rate()->average('value');
    }
}
