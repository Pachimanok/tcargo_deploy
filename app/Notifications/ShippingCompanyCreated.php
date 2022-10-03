<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ShippingCompanyCreated extends Notification
{
    use Queueable;
 
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($shipping_company)
    {
        $this->shipping_company = $shipping_company;
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
                    ->subject(__('notifications.ShippingCompanyCreated_subject'))
                    ->line('<h2><span class="greeting">'.__('notifications.ShippingCompanyCreatedGreeting').'</span></h2><br>')
                    ->line(''.__('notifications.CreatedDate', ['date' => $ldate = date('d-m-Y')]).'')
                    ->line(''.__('notifications.ShippingCompanyCreatedName', ['company_name' => $this->shipping_company->company_name]).'')
                    /*->line(''.__('notifications.ShippingCompanyCreatedEmail', ['email' => $this->shipping_company->email]).'')
                    ->line(''.__('notifications.ShippingCompanyCreatedPhone', ['phone' => $this->shipping_company->phone]).'')
                    ->line(''.__('notifications.ShippingCompanyCreatedMessage'))*/
                    ->action(__('notifications.check_shipping_companies'), url('shipping_companies'));
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
            'id' => $this->shipping_company->id,
            'message' => (__('notifications.ShippingCompanyCreated', ['company_name' => $this->shipping_company->company_name])),
            'url' => url('shipping_companies'),
        ];
    }
}
