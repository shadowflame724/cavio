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
     * @param $faq
     */
    public function __construct($faq)
    {
        $this->faq = $faq;
    }
}
