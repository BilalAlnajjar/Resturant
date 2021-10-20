<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class newOrderNotification extends Notification
{
    use Queueable;

    /**
     * @var Order
     */
    protected $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        //
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['nexmo'];//,'database','nexmo','bordcast' // database,sms,flash notification
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->subject('New Order')
    //                 ->from('bilalthmen53@gmai;.com','Bilal alnajjar')
    //                 ->greeting('Hello')
    //                 ->line('A new order has been created order',$this->order->number)
    //                 ->action('View new order', route('dashboard'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toDatabase($notifiable)
    // {
    //     return [
    //         'message' => 'New Order',
    //         'action' => route('dashboard'),
    //         'icon' => '',
    //     ];
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toNexmo($notifiable) {
        $order_number = $this->order->number;
        $message = new NexmoMessage();
        $message->content("Thank you for your order. Order #$order_number The store will message you when out for delivery. Tel:01412992229");
        return $message;

    }
}
