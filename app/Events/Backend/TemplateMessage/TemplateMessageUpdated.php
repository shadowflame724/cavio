<?php

namespace App\Events\Backend\TemplateMessage;

use Illuminate\Queue\SerializesModels;

/**
 * Class TemplateMessageUpdated.
 */
class TemplateMessageUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $templateMessage;

    /**
     * @var
     */
    public $comment;

    /**
     * @param $templateMessage
     * @param $comment
     */
    public function __construct($templateMessage, $comment)
    {
        $this->templateMessage = $templateMessage;
        $this->comment = $comment;
    }
}
