<?php

namespace App\Events\Backend\Access\Collection;

use Illuminate\Queue\SerializesModels;

/**
 * Class CollectionCreated.
 */
class CollectionCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $collection;

    /**
     * @param $collection
     */
    public function __construct($collection)
    {
        $this->collection = $collection;
    }
}
