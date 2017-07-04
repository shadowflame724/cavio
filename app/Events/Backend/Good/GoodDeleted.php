<?php

namespace App\Events\Backend\Good;

use Illuminate\Queue\SerializesModels;

/**
 * Class GoodDeleted.
 */
class GoodDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $good;

    /**
     * @param $good
     */
    public function __construct($good)
    {
        $this->good = $good;
    }
}
