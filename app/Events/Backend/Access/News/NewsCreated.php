<?php

namespace App\Events\Backend\Access\News;

use Illuminate\Queue\SerializesModels;

/**
 * Class NewsCreated.
 */
class NewsCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $news;

    /**
     * @param $news
     */
    public function __construct($news)
    {
        $this->news = $news;
    }
}
