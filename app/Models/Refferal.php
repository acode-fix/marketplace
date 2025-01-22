<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refferal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,  'refferal_id', 'id');
    }


    public function agent() 
    {
        return $this->belongsTo(User::class, 'refferal_id', 'id');
    }


    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }


}
