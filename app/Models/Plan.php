<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function matchesCode(?string $code): bool
    {
        if (! $code) return false;

        return in_array(
            $code,
            [
                $this->plan_code,
                $this->test_plan_code,
                $this->live_plan_code
            ],
            true
        );
    }
}
