<?php

namespace App\Events\Backend\Page;

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
     * @var
     */
    public $comment;

    /**
     * @param $page
     * @param $comment
     */
    public function __construct($page, $comment)
    {
        $this->page = $page;
        $this->comment = $comment;
    }
}
