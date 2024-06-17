<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Ads_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ads_categories')->insert([
            ['name' => 'scroll', 'price' => 100.00, 'duration' => 30],
            ['name' => 'banner', 'price' => 150.00, 'duration' => 30],
            ['name' => 'both', 'price' => 200.00, 'duration' => 30],
        ]);
    }
}
