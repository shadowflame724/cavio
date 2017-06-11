<?php

namespace App\Listeners\Backend\Block;

/**
 * Class BlockEventListener.
 */
class BlockEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Block';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->block->id)
            ->withText('trans("history.backend.block.created") <strong>'.$event->block->id.'</strong>')
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
            ->withEntity($event->block->id)
            ->withText('trans("history.backend.block.updated") <strong>'.$event->block->id.'</strong>')
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
            ->withEntity($event->block->id)
            ->withText('trans("history.backend.block.deleted") <strong>'.$event->block->id.'</strong>')
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
            \App\Events\Backend\Block\BlockCreated::class,
            'App\Listeners\Backend\Block\BlockEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Block\BlockUpdated::class,
            'App\Listeners\Backend\Block\BlockEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Block\BlockDeleted::class,
            'App\Listeners\Backend\Block\BlockEventListener@onDeleted'
        );
    }
}
