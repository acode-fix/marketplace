<?php

namespace App\Helpers;

use App\Models\Invoice;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;

use function PHPUnit\Framework\returnValueMap;

class Helper
{
    public function __construct() {}

    public static function generateShopNo()
    {

        $bytes = openssl_random_pseudo_bytes(2);
        $number = hexdec(bin2hex($bytes));
        $shopNo = $number % 90000 + 10000;

        return $shopNo;
    }

    public static function generateShopToken($length = 50)
    {

        $key = '';
        // Include digits, uppercase, and lowercase letters
        $keys = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

        for ($i = 0; $i < $length; $i++) {
            // Use random_int for cryptographically secure randomness
            $key .= $keys[random_int(0, count($keys) - 1)];
        }

        return $key;
    }

    public static function getUser($email): User
    {
        return User::where('email', $email)->first();
    }

    // public static function getPlan($planCode): Plan
    // {
    //     return Plan::where('plan_code', $planCode)->first();
    // }

    public static function getPlan(string $planCode): ?Plan
    {
        return Plan::all()->first(function ($plan) use ($planCode) {
            return $plan->matchesCode($planCode);
        });
    }


    public static function getSubscription($subscriptionCode): ?Subscription
    {
        return  Subscription::where('subscription_code', $subscriptionCode)->first();
    }

    public static function getInvoice($invoiceCode): ?Invoice
    {
        return Invoice::where('invoice_code', $invoiceCode)->first();
    }
}
