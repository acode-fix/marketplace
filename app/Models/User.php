<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    use SoftDeletes; // Use the SoftDeletes trait

    protected $dates = ['deleted_at']; // Optional: ensures dates are treated as instances of Carbon;


    public function payment() {

        return $this->hasMany(Payment::class);
    }


       static function getAuthUser(){

          // return  \Auth::guard('sanctum')->user();
       }

       public function referrals()
    {
        return $this->hasMany(Referral::class);
    }

    public function referredBy()
    {
        return $this->hasOne(Referral::class, 'referred_user_id');
    }

        public function products()
    {
        return $this->hasMany(Product::class)->where('quantity', '!=', 0);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->referral_code = $user->generateReferralCode();
        });
    }

    public function generateReferralCode()
    {
        do {
            $code = Str::random(10);
        } while (self::where('referral_code', $code)->exists());

        return $code;
    }
}
