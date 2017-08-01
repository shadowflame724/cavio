<?php

namespace App\Mail;

use App\Models\Order\Order;
use App\Models\TemplateMessage\TemplateMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderDelivered extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    protected $order;

    /**
     * Create a new message instance.
     *
     * @param  $order
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     * @return $this
     */
    public function build()
    {
        $text = TemplateMessage::where('type', '=', 'on_order_delivered')->first();

        return $this->view('backend.mails.delivered', ['text' => $text]);
    }
}
