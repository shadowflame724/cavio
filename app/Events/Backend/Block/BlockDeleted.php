<?php

namespace App\Events\Backend\Block;

use Illuminate\Queue\SerializesModels;

/**
 * Class BlockDeleted.
 */
class BlockDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $block;

    /**
     * @param $block
     */
    public function __construct($block)
    {
        $this->block = $block;
    }
}
