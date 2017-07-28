<?php

namespace App\Listeners\Backend\Settings;

/**
 * Class SettingsEventListener.
 */
class SettingsEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Settings';

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->settings->id)
            ->withText('trans("history.backend.settings.updated").<br>
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
            \App\Events\Backend\Settings\SettingsUpdated::class,
            'App\Listeners\Backend\Settings\SettingsEventListener@onUpdated'
        );
    }
}
