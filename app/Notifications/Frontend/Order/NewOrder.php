<?php

namespace App\Notifications\Frontend\Order;

use App\Models\TemplateMessage\TemplateMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Class UserNeedsConfirmation.
 */
class NewOrder extends Notification
{
    use Queueable;

    /**
     * @var
     */
    protected $order;

    /**
     * UserNeedsConfirmation constructor.
     *
     * @param $confirmation_code
     */
    public function __construct($order)
    {
        $this->order = $order;
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
        $model = TemplateMessage::where('type', '=', 'on_order')->first();

        $name = $model->{'title'.$suf};
        $body = $model->{'body'.$suf};
        $order = $this->order;

        return (new MailMessage())
            ->subject(app_name() . ': ' . $name)
            ->line($body);
    }
}
