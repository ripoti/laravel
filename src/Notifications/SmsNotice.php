<?php

namespace Kinatech\BugClasper\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SmsNotice extends Notification
{
    use Queueable;

    protected string $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['sms'];
    }

    /**
     * Get the sms representation of the notification.
     *
     * @param mixed $notifiable
     * @return string
     */
    public function toSms(mixed $notifiable): string
    {
        return $this->message;
    }
}
