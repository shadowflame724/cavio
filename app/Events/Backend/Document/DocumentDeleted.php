<?php

namespace App\Events\Backend\Document;

use Illuminate\Queue\SerializesModels;

/**
 * Class DocumentDeleted.
 */
class DocumentDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $document;

    /**
     * @param $document
     */
    public function __construct($document)
    {
        $this->document = $document;
    }
}
