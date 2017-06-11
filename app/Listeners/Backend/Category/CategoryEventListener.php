<?php

namespace App\Listeners\Backend\Category;

/**
 * Class CategoryEventListener.
 */
class CategoryEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Category';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->category->id)
            ->withText('trans("history.backend.category.created") <strong>'.$event->category->id.'</strong>')
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
            ->withEntity($event->category->id)
            ->withText('trans("history.backend.category.updated") <strong>'.$event->category->id.'</strong>')
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
            ->withEntity($event->category->id)
            ->withText('trans("history.backend.category.deleted") <strong>'.$event->category->id.'</strong>')
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
            \App\Events\Backend\Category\CategoryCreated::class,
            'App\Listeners\Backend\Category\CategoryEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Category\CategoryUpdated::class,
            'App\Listeners\Backend\Category\CategoryEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Category\CategoryDeleted::class,
            'App\Listeners\Backend\Category\CategoryEventListener@onDeleted'
        );
    }
}
