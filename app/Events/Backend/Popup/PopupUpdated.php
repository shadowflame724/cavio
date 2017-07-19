<?php

namespace App\Events\Backend\Popup;

use Illuminate\Queue\SerializesModels;

/**
 * Class PopupUpdated.
 */
class PopupUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $popup;

    /**
     * @var
     */
    public $comment;

    /**
     * @param $popup
     * @param $comment
     */
    public function __construct($popup, $comment)
    {
        $this->popup = $popup;
        $this->comment = $comment;
    }
}
