<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifikasiEmail extends Notification
{
    use Queueable;

    private $data = [];

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id, $token, $name, $expired)
    {
        $this->data['id'] = $id;
        $this->data['token'] = $token;
        $this->data['name'] = $name;
        $this->data['expired'] = $expired;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/auth/email-verification?id=' . $this->data['id'] . '&token=' . $this->data['token'] . '&expired=' . $this->data['expired']);
        $resend_url = url('/auth/resend-verification?id='. $this->data['id']);
        return (new MailMessage)->subject('Verifikasi Email')
                                ->markdown('auth.verify-email', ['url' => $url, 'resend' => $resend_url]);
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
            //
        ];
    }
}
