<?php

namespace App\Listeners\Backend\Good;

/**
 * Class GoodEventListener.
 */
class GoodEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Good';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->good->id)
            ->withText('trans("history.backend.good.created") <strong>'.$event->good->name.'</strong>')
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
            ->withEntity($event->good->id)
            ->withText('trans("history.backend.good.updated") <strong>'.$event->good->name.'</strong>')
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
            ->withEntity($event->good->id)
            ->withText('trans("history.backend.good.deleted") <strong>'.$event->good->name.'</strong>')
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
            \App\Events\Backend\Good\GoodCreated::class,
            'App\Listeners\Backend\Good\GoodEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Good\GoodUpdated::class,
            'App\Listeners\Backend\Good\GoodEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Good\GoodDeleted::class,
            'App\Listeners\Backend\Good\GoodEventListener@onDeleted'
        );
    }
}
