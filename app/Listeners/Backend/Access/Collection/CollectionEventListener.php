<?php

namespace App\Listeners\Backend\Access\Collection;

/**
 * Class CollectionEventListener.
 */
class CollectionEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Collection';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->collection->id)
            ->withText('trans("history.backend.collection.created") <strong>'.$event->collection->title.'</strong>')
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
            ->withEntity($event->collection->id)
            ->withText('trans("history.backend.collection.updated") <strong>'.$event->collection->title.'</strong>')
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
            ->withEntity($event->collection->id)
            ->withText('trans("history.backend.collection.deleted") <strong>'.$event->collection->title.'</strong>')
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
            \App\Events\Backend\Access\Collection\CollectionCreated::class,
            'App\Listeners\Backend\Access\Collection\CollectionEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Access\Collection\CollectionUpdated::class,
            'App\Listeners\Backend\Access\Collection\CollectionEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Access\Collection\CollectionDeleted::class,
            'App\Listeners\Backend\Access\Collection\CollectionEventListener@onDeleted'
        );
    }
}
