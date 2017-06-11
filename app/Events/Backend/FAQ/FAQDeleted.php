<?php

namespace App\Events\Backend\FAQ;

use Illuminate\Queue\SerializesModels;

/**
 * Class FAQDeleted.
 */
class FAQDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $faq;

    /**
     * @param $faq
     */
    public function __construct($faq)
    {
        $this->faq = $faq;
    }
}
