<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LearnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('learns')->insert([
            'title' => 'How to Create Ads on Buy and Sell',
            'url' => 'https://www.youtube.com/embed/kXShLPXfWZA?si=RsWHKgO-ZXdq6iB8',
            'description' => 'Buy and sell',
        ]);
    }
}
