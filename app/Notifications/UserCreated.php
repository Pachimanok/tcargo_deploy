<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($new_user)
    {
        $this->new_user = (object) $new_user;
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
            ->subject(__('notifications.UserCreated_subject'))
            ->line('<h2><span class="greeting">HOLA, '.__('notifications.UserCreatedGreeting').'</span></h2><br>')
            ->line(''.__('notifications.CreatedDate', ['date' => $ldate = date('d-m-Y')]).'')
            ->line(__('notifications.UserCreatedEmail', ['email' => $this->new_user->email]))
            ->line(__('notifications.UserCreatedName', ['name' => $this->new_user->name]))
            ->action(__('notifications.check_users'), url('users'));
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
            'message' => (__('notifications.UserCreated', ['email' => $this->new_user->email])),
            'url' => url('users'),
        ];
    }
}
