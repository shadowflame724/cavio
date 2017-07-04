<?php

namespace App\Listeners\Backend\Showroom;

/**
 * Class ShowroomEventListener.
 */
class ShowroomEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Showroom';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->showroom->id)
            ->withText('trans("history.backend.showroom.created") <strong>'.$event->showroom->name.'</strong>')
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
            ->withEntity($event->showroom->id)
            ->withText('trans("history.backend.showroom.updated") <strong>'.$event->showroom->name.'</strong>')
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
            ->withEntity($event->showroom->id)
            ->withText('trans("history.backend.showroom.deleted") <strong>'.$event->showroom->name.'</strong>')
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
            \App\Events\Backend\Showroom\ShowroomCreated::class,
            'App\Listeners\Backend\Showroom\ShowroomEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Showroom\ShowroomUpdated::class,
            'App\Listeners\Backend\Showroom\ShowroomEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Showroom\ShowroomDeleted::class,
            'App\Listeners\Backend\Showroom\ShowroomEventListener@onDeleted'
        );
    }
}
