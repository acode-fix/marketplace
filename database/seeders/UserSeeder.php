<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('users')->insert([
        // ['name' => 'Test User',
        // 'email' => 'user@example.com',
        // 'user_type' => 2,
        // 'password' =>bcrypt('1234')
    
        // ],
        // [
        //  'name' => 'Admin User',
        //  'email' => 'info@loopmart.ng',
        //  'user_type' => 1,
        // 'password'=>Hash::make('$loopmart@+2024'),
        // ]
           

        // ]);

        User::factory()->count(100)->create();
    }
}
