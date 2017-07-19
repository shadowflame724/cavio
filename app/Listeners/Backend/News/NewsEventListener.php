<?php

namespace App\Listeners\Backend\News;

/**
 * Class NewsEventListener.
 */
class NewsEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'News';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->news->id)
            ->withText('trans("history.backend.news.created") <strong>'.$event->news->title.'</strong>.<br>
<small>'.$event->comment.'</small>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->news->id)
            ->withText('trans("history.backend.news.updated") <strong>'.$event->news->title.'</strong>.<br>
<small>'.$event->comment.'</small>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->news->id)
            ->withText('trans("history.backend.news.deleted") <strong>'.$event->news->title.'</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->log();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\News\NewsCreated::class,
            'App\Listeners\Backend\News\NewsEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\News\NewsUpdated::class,
            'App\Listeners\Backend\News\NewsEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\News\NewsDeleted::class,
            'App\Listeners\Backend\News\NewsEventListener@onDeleted'
        );
    }
}
