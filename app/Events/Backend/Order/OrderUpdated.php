<?php

namespace App\Events\Backend\Order;

use Illuminate\Queue\SerializesModels;

/**
 * Class OrderUpdated.
 */
class OrderUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $order;

    /**
     * @var
     */
    public $comment;

    /**
     * @param $order
     * @param $comment
     */
    public function __construct($order, $comment)
    {
        $this->order = $order;
        $this->comment = $comment;
    }
}
