<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Verification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'nationality',
        'address',
        'gender',
        'phone_number',
        'nin_file',
        'selfie_photo',
        'badge_type',
        'approved',
    ];

    // Relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }






}
