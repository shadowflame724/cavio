<?php

namespace App\Events\Backend\FinishTissue;

use Illuminate\Queue\SerializesModels;

/**
 * Class FinishTissueDeleted.
 */
class FinishTissueDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $finishTissue;

    /**
     * @param $finishTissue
     */
    public function __construct($finishTissue)
    {
        $this->finishTissue = $finishTissue;
    }
}
