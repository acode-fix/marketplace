<?php

namespace App\Models;

use App\Enums\InvoiceStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $cast = [
     'status' => InvoiceStatus::class
    ];


    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
