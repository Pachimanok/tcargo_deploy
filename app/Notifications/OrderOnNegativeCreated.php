<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Checkpoint;

class OrderOnNegativeCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
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
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject(__('notifications.OrderOnNegativeCreated_subject'))
                    ->line('<h2><span class="greeting">HOLA, '.__('notifications.OrderOnNegativeCreated_subject').'</span></h2>')
                    ->line(''.__('notifications.CreatedDate', ['date' => $ldate = date('d-m-Y')]).'')
                    ->line(__('notifications.OrderNumber', ['order_id' => $this->order->id]))
                    ->line(__('notifications.OrderOnNegativeTransit', [ 'transit_id' => $this->order->checkpoint->transit->id]))
                    ->action(__('notifications.check_orders'), url('orders/all/'.$this->order->checkpoint->transit->shipping_company->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'id' => $this->order->id,
            'message' => __('notifications.OrderOnNegativeCreated', ['order_id' => $this->order->id, 'transit_id' => $this->order->checkpoint->transit->id]),
            'url' => url('orders/all/'.$this->order->checkpoint->transit->shipping_company->id),
        ];
    }
}
