<?php

namespace App\Console\Commands;

use App\Models\Plan;
use App\Services\PaystackSubscriptionService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SyncPaystackPlans extends Command
{

    public function __construct(public PaystackSubscriptionService $paystack)
    {
        parent::__construct();
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'paystack:sync-plans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    // public function handle()
    // {
    //     $plans = $this->paystack->getPlans();

    //     foreach ($plans as $plan) {
    //         Plan::updateOrCreate(
    //             ['plan_code' => $plan['plan_code']],
    //             [
    //                 'name' => $plan['name'],
    //                 'interval' => $plan['interval'],
    //                 'amount' => $plan['amount'] / 100,
    //             ]
    //         );
    //     }

    //     $this->info('Plans synced successfully');
    // }


    public function handle()
    {
        $plans = $this->paystack->getPlans();

        $isLive = app()->environment('production');

        foreach ($plans as $plan) {

            if ($plan['is_deleted'] === true) {
                continue;
            }
            $localPlan = Plan::where('interval', $plan['interval'])->first();

            if (!$localPlan) {
                $this->warn("No local plan for interval: {$plan['interval']}");
                continue;
            }

            $data = [
                'name' => $plan['name'],
                'amount' => $plan['amount'] / 100,
            ];

            if ($isLive) {
                $data['live_plan_code'] = $plan['plan_code'];
            } else {
                $data['test_plan_code'] = $plan['plan_code'];
            }

            $localPlan->update($data);
        }

        $this->info('Plans synced successfully');
    }
}
