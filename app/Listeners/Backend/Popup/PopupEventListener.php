<?php

namespace App\Listeners\Backend\Popup;

/**
 * Class PopupEventListener.
 */
class PopupEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Popup';

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->popup->id)
            ->withText('trans("history.backend.popup.updated") <strong>'.$event->popup->title.'</strong>.<br>
<small>'.$event->comment.'</small>')
            ->withIcon('save')
            ->withClass('bg-aqua')
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
            \App\Events\Backend\Popup\PopupUpdated::class,
            'App\Listeners\Backend\Popup\PopupEventListener@onUpdated'
        );
    }
}
