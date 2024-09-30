<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class badgeUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('badge_units')->insert([
            ['name' => 'monthly',
            'duration' => 1,
            'amount' => 2500,
            'purpose' => 'badge_subscription',
            'description' => 'monthly badge subscription',
            
        ],
        
            ['name' => 'yearly',
            'duration' => 12,
            'amount' => 20000,
            'purpose' => 'badge_subscription',
            'description' => 'yearly subscription',]

        ]);
    }
}
