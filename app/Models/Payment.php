<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Carbon\CarbonImmutable;

class Payment extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateTxn(){
        $bytes = openssl_random_pseudo_bytes(16);
        $m = strtoupper(substr(bin2hex($bytes), -10));
        $uniq = substr(hexdec(uniqid()), -5);
        $ran = mt_rand(10000, 99999);
        $txn = str_shuffle($m . $ran . $uniq);
    
        return $txn;
      }

      public static function generateInvoice()
    {

      $bytes = openssl_random_pseudo_bytes(16);
      $m = strtoupper(substr(bin2hex($bytes), -10));
      $uniq = substr(hexdec(uniqid()), -5);
      $ran = mt_rand(10000, 99999);
      $txn = str_shuffle($m . $ran . $uniq);
      $inv = 'INV' . str_shuffle($m . $ran . $uniq);
      return $inv;
    }


    public static function convinientfees($realamount)
    {  
      if($realamount <= 2500){
  
        $amount = $realamount/(1-(1.5/100)) +0.03;
  
       
  
      } else if($realamount > 2500){
  
        $amount = $realamount/(1-(1.5/100)) +100;
  
      }
  
      $convinience= $amount - $realamount;
  
        $convinienceFees =  ceil($convinience);
  
      
      if($convinienceFees > 2000){
  
        $Charges = 2000;
  
        $convinienceFees = $Charges;
       }
  
      $total=  $realamount + $convinienceFees;
  
      return $total;
  
  
  
    }


    public static function getExpiryDate($badgeType) {

      if($badgeType === 'monthly') {

       return   CarbonImmutable::now()->addMonths(1);

      }elseif($badgeType === 'yearly') {

          return  CarbonImmutable::now()->addMonths(11);

      }

  return null;



  }




}
