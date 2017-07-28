<?php

namespace App\Events\Backend\TemplateMessage;

use Illuminate\Queue\SerializesModels;

/**
 * Class TemplateMessageDeleted.
 */
class TemplateMessageDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $templateMessage;

    /**
     * @param $templateMessage
     */
    public function __construct($templateMessage)
    {
        $this->templateMessage = $templateMessage;
    }
}
