<?php

namespace App\Listeners\Backend\Document;

/**
 * Class DocumentEventListener.
 */
class DocumentEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Document';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->document->id)
            ->withText('trans("history.backend.document.created") <strong>'.$event->document->name.'</strong>.<br>
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
            ->withEntity($event->document->id)
            ->withText('trans("history.backend.document.updated") <strong>'.$event->document->name.'</strong>.<br>
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
            ->withEntity($event->document->id)
            ->withText('trans("history.backend.document.deleted") <strong>'.$event->document->name.'</strong>')
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
            \App\Events\Backend\Document\DocumentCreated::class,
            'App\Listeners\Backend\Document\DocumentEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Document\DocumentUpdated::class,
            'App\Listeners\Backend\Document\DocumentEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Document\DocumentDeleted::class,
            'App\Listeners\Backend\Document\DocumentEventListener@onDeleted'
        );
    }
}
