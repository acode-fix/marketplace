<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;
    protected $fillable = ['image_url', 'user_id', 'start_date', 'end_date', 'amount', 'duration',
    'points_earned', 'ads_status', 'rate' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(AdvertCategory::class);
    }
}
