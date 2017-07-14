<?php

namespace App\Listeners\Backend\FinishTissue;

/**
 * Class FinishTissueEventListener.
 */
class FinishTissueEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'FinishTissue';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->finishTissue->id)
            ->withText('trans("history.backend.finishTissue.created") <strong>'.$event->finishTissue->title.'</strong>')
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
            ->withEntity($event->finishTissue->id)
            ->withText('trans("history.backend.finishTissue.updated") <strong>'.$event->finishTissue->title.'</strong>')
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
            ->withEntity($event->finishTissue->id)
            ->withText('trans("history.backend.finishTissue.deleted") <strong>'.$event->finishTissue->title.'</strong>')
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
            \App\Events\Backend\FinishTissue\FinishTissueCreated::class,
            'App\Listeners\Backend\FinishTissue\FinishTissueEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\FinishTissue\FinishTissueUpdated::class,
            'App\Listeners\Backend\FinishTissue\FinishTissueEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\FinishTissue\FinishTissueDeleted::class,
            'App\Listeners\Backend\FinishTissue\FinishTissueEventListener@onDeleted'
        );
    }
}
