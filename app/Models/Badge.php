<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Carbon\CarbonImmutable;

class Badge extends Model
{
    use HasFactory;

   protected $guarded = [];


    public static function getExpiryDate($badgeType) {

        if($badgeType === 'monthly') {

         return   CarbonImmutable::now()->addMonths(1);

        }elseif($badgeType === 'yearly') {

            return  CarbonImmutable::now()->addMonths(11);

        }

    return null;



    }




}
