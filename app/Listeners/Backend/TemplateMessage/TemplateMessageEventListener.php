<?php

namespace App\Listeners\Backend\TemplateMessage;

/**
 * Class TemplateMessageEventListener.
 */
class TemplateMessageEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'TemplateMessage';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->templateMessage->id)
            ->withText('trans("history.backend.templateMessage.created") <strong>'.$event->templateMessage->title.'</strong>.<br>
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
            ->withEntity($event->templateMessage->id)
            ->withText('trans("history.backend.templateMessage.updated") <strong>'.$event->templateMessage->title.'</strong>.<br>
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
            ->withEntity($event->templateMessage->id)
            ->withText('trans("history.backend.templateMessage.deleted") <strong>'.$event->templateMessage->title.'</strong>')
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
            \App\Events\Backend\TemplateMessage\TemplateMessageCreated::class,
            'App\Listeners\Backend\TemplateMessage\TemplateMessageEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\TemplateMessage\TemplateMessageUpdated::class,
            'App\Listeners\Backend\TemplateMessage\TemplateMessageEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\TemplateMessage\TemplateMessageDeleted::class,
            'App\Listeners\Backend\TemplateMessage\TemplateMessageEventListener@onDeleted'
        );
    }
}
