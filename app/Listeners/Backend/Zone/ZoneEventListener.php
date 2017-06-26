<?php

namespace App\Listeners\Backend\Zone;

/**
 * Class ZoneEventListener.
 */
class ZoneEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Zone';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->zone->id)
            ->withText('trans("history.backend.zone.created") <strong>'.$event->zone->title.'</strong>')
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
            ->withEntity($event->zone->id)
            ->withText('trans("history.backend.zone.updated") <strong>'.$event->zone->title.'</strong>')
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
            ->withEntity($event->zone->id)
            ->withText('trans("history.backend.zone.deleted") <strong>'.$event->zone->title.'</strong>')
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
            \App\Events\Backend\Zone\ZoneCreated::class,
            'App\Listeners\Backend\Zone\ZoneEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Zone\ZoneUpdated::class,
            'App\Listeners\Backend\Zone\ZoneEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Zone\ZoneDeleted::class,
            'App\Listeners\Backend\Zone\ZoneEventListener@onDeleted'
        );
    }
}
