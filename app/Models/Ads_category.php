<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads_category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }
}
