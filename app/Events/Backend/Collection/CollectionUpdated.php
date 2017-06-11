<?php

namespace App\Events\Backend\Collection;

use Illuminate\Queue\SerializesModels;

/**
 * Class CollectionUpdated.
 */
class CollectionUpdated
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
