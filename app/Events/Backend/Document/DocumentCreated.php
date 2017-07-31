<?php

namespace App\Events\Backend\Document;

use Illuminate\Queue\SerializesModels;

/**
 * Class DocumentCreated.
 */
class DocumentCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $document;

    /**
     * @var
     */
    public $comment;

    /**
     * @param $document
     * @param $comment
     */
    public function __construct($document, $comment)
    {
        $this->document = $document;
        $this->comment = $comment;
    }
}
