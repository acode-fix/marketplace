<?php

namespace App\Console\Commands;

use App\Models\Plan;
use App\Services\PaystackSubscriptionService;
use Illuminate\Console\Command;

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
    public function handle()
    {
        $plans = $this->paystack->getPlans();

        foreach ($plans as $plan) {
            Plan::updateOrCreate(
                ['plan_code' => $plan['plan_code']],
                [
                    'name' => $plan['name'],
                    'interval' => $plan['interval'],
                    'amount' => $plan['amount'] / 100,
                ]
            );
        }

        $this->info('Plans synced successfully');
    }
}
