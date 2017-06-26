<?php

namespace App\Events\Backend\Zone;

use Illuminate\Queue\SerializesModels;

/**
 * Class ZoneCreated.
 */
class ZoneCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $zone;

    /**
     * @param $zone
     */
    public function __construct($zone)
    {
        $this->zone = $zone;
    }
}
