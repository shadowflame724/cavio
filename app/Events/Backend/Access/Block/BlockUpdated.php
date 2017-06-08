<?php

namespace App\Events\Backend\Access\Block;

use Illuminate\Queue\SerializesModels;

/**
 * Class BlockUpdated.
 */
class BlockUpdated
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
