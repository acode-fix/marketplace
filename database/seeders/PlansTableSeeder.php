<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::withToken(config('services.paystack.secret_key'))->get('https://api.paystack.co/plan');

        if($response->successful()){
            $plans = $response->json()['data'];

            foreach($plans as $plan){
                Plan::updateOrCreate(
                    ['plan_code' => $plan['plan_code']],
                    [
                     'name' => $plan['name'],
                     'amount' => $plan['amount'] / 100
                    ]
                    );
            }

            $this->command->info('Plans synced successfully');

        }else {
            $this->command->error('Failed to fetch plans from paystack');
            $this->command->line('Status: ' . $response->status());
            $this->command->line('Response: ' . $response->body());
        }
    }
}
