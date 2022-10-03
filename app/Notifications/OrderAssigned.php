<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderAssigned extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $order)
    {
        $this->order = (object) $order;
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
            ->subject(__('notifications.OrderAssigned_subject'))
            ->line('<h2><span class="greeting">HOLA <strong>'.$this->order->user->name.'</strong>, '.__('notifications.OrderAssigned_subject').'</span></h2><br>')
            ->line(''.__('notifications.CreatedDate', ['date' => $ldate = date('d-m-Y')]).'')
            ->line(__('notifications.OrderNumber', ['order_id' => $this->order->id]))
            ->line(__('notifications.ShippingCompanyName', ['company_name' => $this->order->shipping_company->company_name]))
            ->action(__('notifications.check_orders'), url('orders/my?id='.$this->order->id));
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
            'message' => __('notifications.OrderAssigned_subject'),
            'url' => url('orders'),
        ];
    }
}
