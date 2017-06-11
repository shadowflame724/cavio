<?php

namespace App\Events\Backend\Block;

use Illuminate\Queue\SerializesModels;

/**
 * Class BlockCreated.
 */
class BlockCreated
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
