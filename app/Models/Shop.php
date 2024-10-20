<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;


    public static function shopNo() {

        $bytes = openssl_random_pseudo_bytes(2);
        $number = hexdec(bin2hex($bytes));
        $shopNo = $number % 90000 + 10000; 

    return $shopNo;

    }

   public static function shopToken($length) {

        $key = '';
        // Include digits, uppercase, and lowercase letters
        $keys = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

        for ($i = 0; $i < $length; $i++) {
            // Use random_int for cryptographically secure randomness
            $key .= $keys[random_int(0, count($keys) - 1)];
        }

        return $key;
        
    }





}
