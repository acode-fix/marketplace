<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Learn;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //    $this->call(UserSeeder::class);
        //    $this->call(CategorySeeder::class);
        //     $this->call(Role_and_Permission::class);
        //     $this->call(Ads_categorySeeder::class);
        //     $this->call(LearnSeeder::class);
        //     $this->call(BadgeUnitSeeder::class);
        //     $this->call(RoleSeeder::class);

        $this->call([
           /* RoleSeeder::class,
           
            UserSeeder::class,
            CategorySeeder::class,
            Ads_CategorySeeder::class,
            LearnSeeder::class,
            BadgeUnitSeeder::class,*/

            UserSeeder::class,
        ]);
        

            

    }
}
