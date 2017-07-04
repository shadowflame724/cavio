<?php

namespace App\Events\Backend\Showroom;

use Illuminate\Queue\SerializesModels;

/**
 * Class ShowroomDeleted.
 */
class ShowroomDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $showroom;

    /**
     * @param $showroom
     */
    public function __construct($showroom)
    {
        $this->showroom = $showroom;
    }
}
