<?php

namespace App\Mail;

use App\Models\TemplateMessage\TemplateMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderSend extends Mailable
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
        $model = TemplateMessage::where('type', '=', 'on_order')->first();

        $name = $model->{'title'.$suf};
        $body = $model->{'body'.$suf};

        return $this->view('frontend.mails.order', [
            'temp'=>[
                'name' => $name,
                'body' => $body
            ]
        ]);
    }
}
