<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ReviewPushNotification extends Notification
{
    use Queueable;

    protected $user_id;
    protected $productId;
    protected $msg;

    /**
     * Create a new notification instance.
     */
    public function __construct($user_id, $productId, $msg)
    {
        $this->user_id = $user_id;
        $this->productId = $productId;
        $this->msg = $msg;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */


     public function via($notifiable)
    {
          return ['database', 'broadcast'];

     }


     public function toArray($notifiable)
     {
         return [
             'comment'=>$this->msg,
             'user_id'=>$this->user_id,
             'product_id' => $this->productId,
         ];
     }
     public function toBroadcast($notifiable)
     {
 
         return new BroadcastMessage([
             'comment'=>$this->msg,
             'user_id'=>$this->user_id,
             'product_id' => $this->productId,
         ]);
     }
     public function broadcastOn(){
         return ['marketplace'];
     }

    /* 
    public function via(object $notifiable): array
    {
        return ['mail'];
    }
    */
    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */

     /*
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

    */
}
