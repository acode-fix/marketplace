<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\ProductEngagementLog;
use App\Models\User;
use App\Notifications\ReviewPushNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notifications';

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
        $pendingConnects =  ProductEngagementLog::where('status', 0)->get();

        foreach ($pendingConnects as $connect) {

            $user = User::find($connect->user_id);
            if(!$user){
                continue;
            }

            $product = Product::where('id', $connect->product_id)
                ->where('quantity', '>', 0)
                ->first();

            if (!$product) {
                continue;
            }

            try {

                $user->notify(new ReviewPushNotification($user->id, $product->id, $product->user_id, 'You connected with this product'));

                $connect->update(['status' => 1]);
            
            } catch (\Throwable $e) {
                
                Log::error("Notification failed", [
                    'connect_id' => $connect->id,
                    'error' => $e->getMessage(),
                ]);
            }

            
        }

        $this->info("Notifications sent successfully");

        return Command::SUCCESS;
    }
}
