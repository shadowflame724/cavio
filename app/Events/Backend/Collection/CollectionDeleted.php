<?php

namespace App\Events\Backend\Collection;

use Illuminate\Queue\SerializesModels;

/**
 * Class CollectionDeleted.
 */
class CollectionDeleted
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
