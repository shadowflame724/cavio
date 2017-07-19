<?php

namespace App\Listeners\Backend\FAQ;

/**
 * Class FAQEventListener.
 */
class FAQEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'FAQ';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->faq->id)
            ->withText('trans("history.backend.faq.created") <strong>'.$event->faq->id.'</strong>.<br>
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
            ->withEntity($event->faq->id)
            ->withText('trans("history.backend.faq.updated") <strong>'.$event->faq->id.'</strong>.<br>
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
            ->withEntity($event->faq->id)
            ->withText('trans("history.backend.faq.deleted") <strong>'.$event->faq->id.'</strong>')
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
            \App\Events\Backend\FAQ\FAQCreated::class,
            'App\Listeners\Backend\FAQ\FAQEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\FAQ\FAQUpdated::class,
            'App\Listeners\Backend\FAQ\FAQEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\FAQ\FAQDeleted::class,
            'App\Listeners\Backend\FAQ\FAQEventListener@onDeleted'
        );
    }
}
