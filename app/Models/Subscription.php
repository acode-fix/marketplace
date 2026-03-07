<?php

namespace App\Models;

use App\Enums\SubscriptionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => SubscriptionStatus::class,
        'period_start' => 'datetime',
        'period_end' => 'datetime',
        'next_payment_date' => 'datetime',


    ];


    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }


    public function latestInvoice()
    {
        return $this->hasOne(Invoice::class)->latestOfMany();
    }

    public function isActive()
    {
        return $this->status === SubscriptionStatus::ACTIVE && $this->period_end?->isFuture();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
