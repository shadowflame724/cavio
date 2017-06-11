<?php

namespace App\Listeners\Backend\Page;

/**
 * Class PageEventListener.
 */
class PageEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Page';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->page->id)
            ->withText('trans("history.backend.page.created") <strong>'.$event->page->id.'</strong>')
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
            ->withEntity($event->page->id)
            ->withText('trans("history.backend.page.updated") <strong>'.$event->page->id.'</strong>')
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
            ->withEntity($event->page->id)
            ->withText('trans("history.backend.page.deleted") <strong>'.$event->page->id.'</strong>')
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
            \App\Events\Backend\Page\PageCreated::class,
            'App\Listeners\Backend\Page\PageEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Page\PageUpdated::class,
            'App\Listeners\Backend\Page\PageEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Page\PageDeleted::class,
            'App\Listeners\Backend\Page\PageEventListener@onDeleted'
        );
    }
}
