<?php

namespace App\Events\Backend\Showroom;

use Illuminate\Queue\SerializesModels;

/**
 * Class ShowroomCreated.
 */
class ShowroomCreated
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
