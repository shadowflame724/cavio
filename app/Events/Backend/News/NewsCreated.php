<?php

namespace App\Events\Backend\News;

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
     * @var
     */
    public $comment;

    /**
     * @param $news
     * @param $comment
     */
    public function __construct($news, $comment)
    {
        $this->news = $news;
        $this->comment = $comment;
    }
}
