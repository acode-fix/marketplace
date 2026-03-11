<?php

namespace App\Console\Commands;

use App\Enums\PaystackSubscriptionPlan;
use App\Services\PaystackSubscriptionService;
use Illuminate\Console\Command;

class CreatePaystackPlans extends Command
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
    protected $signature = 'paystack:create-plans';

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
        foreach(PaystackSubscriptionPlan::cases() as $plan){
            $this->paystack->createPlan($plan->label(), $plan->interval(), $plan->amount());

        }
        

        $this->info('Plans created successfully');
    }
}
