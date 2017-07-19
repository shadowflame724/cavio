<?php

namespace App\Events\Backend\FAQ;

use Illuminate\Queue\SerializesModels;

/**
 * Class FAQCreated.
 */
class FAQCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $faq;

    /**
     * @var
     */
    public $comment;

    /**
     * @param $faq
     * @param $comment
     */
    public function __construct($faq, $comment)
    {
        $this->faq = $faq;
        $this->comment = $comment;
    }
}
