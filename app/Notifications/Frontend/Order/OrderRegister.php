<?php

namespace App\Notifications\Frontend\Order;

use App\Models\TemplateMessage\TemplateMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Class UserNeedsConfirmation.
 */
class OrderRegister extends Notification
{
    use Queueable;

    /**
     * @var
     */
    protected $user_data;

    /**
     * UserNeedsConfirmation constructor.
     *
     * @param $confirmation_code
     */
    public function __construct($data)
    {
        $this->user_data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $suf = config('app.langs')['suf'];
        $model = TemplateMessage::where('type', '=', 'on_order_register')->first();

        $name = $model->{'title'.$suf};
        $body = $model->{'body'.$suf};
        if(isset($this->user_data['email'])) {
            $body = str_replace('[login]', $this->user_data['email'], $body);
        }
        if(isset($this->user_data['password'])) {
            $body = str_replace('[password]', $this->user_data['password'], $body);
        }

        return (new MailMessage())
            ->subject(app_name() . ': ' . $name)
            ->line($body);
    }
}
