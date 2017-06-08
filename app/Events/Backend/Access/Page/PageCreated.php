<?php

namespace App\Events\Backend\Access\Page;

use Illuminate\Queue\SerializesModels;

/**
 * Class PageCreated.
 */
class PageCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $page;

    /**
     * @param $page
     */
    public function __construct($page)
    {
        $this->page = $page;
    }
}
