<?php

namespace App\Mail;

use App\Models\TemplateMessage\TemplateMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderRegister extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    protected $user_data;

    /**
     * Create a new message instance.
     *
     * @param  $order
     */
    public function __construct($data)
    {
        $this->user_data = $data;
    }
    /**
     * Build the message.
     * @return $this
     */
    public function build()
    {
        $suf = config('app.langs')['suf'];
        $model = TemplateMessage::where('type', '=', 'on_order_register')->first();

        $name = $model->{'title'.$suf};
        $body = $model->{'body'.$suf};
        if(isset($this->user_data['email'])) {
            $body = str_replace('[login]', $this->user_data['email'], $body);
        } else {
            $body .= ' !!not_email';
        }
        if(isset($this->user_data['password'])) {
            $body = str_replace('[password]', $this->user_data['password'], $body);
        } else {
            $body .= ' !!not_pass';
        }

        return $this->view('frontend.mails.register', [
            'temp'=>[
                'name' => $name,
                'body' => $body
            ]
        ]);
    }
}
