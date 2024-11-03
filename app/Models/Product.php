<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'user_id', 'title', 'description', 'category_id', 'quantity',
        'location', 'actual_price', 'promo_price', 'condition', 'image_url', 'ask_for_price', 'sold', 'avg_rating'
    ];

    protected $casts = [
        'ask_for_price' => 'boolean',  // Ensure this attribute is cast to a boolean
    ];

   // protected $guarded = [];

    // protected $casts = [
    //     'image_url' => 'json'
    // ];

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

        public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews() {

        return $this->hasMany(Review::class);
    }


    static function getProduct($id){
          return  Product::find($id);
    }

    public function getAverageRatingAttribute()
    {
        return $this->rate()->average('value');
    }
}
