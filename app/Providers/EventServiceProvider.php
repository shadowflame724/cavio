<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider.
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [];

    /**
     * Class event subscribers.
     *
     * @var array
     */
    protected $subscribe = [
        /*
         * Frontend Subscribers
         */

        /*
         * Auth Subscribers
         */
        \App\Listeners\Frontend\Auth\UserEventListener::class,

        /*
         * Backend Subscribers
         */

        /*
         * Access Subscribers
         */
        \App\Listeners\Backend\Access\User\UserEventListener::class,
        \App\Listeners\Backend\Access\Role\RoleEventListener::class,


        /*
        * Content Subscribers
        */
        \App\Listeners\Backend\Page\PageEventListener::class,
        \App\Listeners\Backend\FAQ\FAQEventListener::class,
        \App\Listeners\Backend\Category\CategoryEventListener::class,
        \App\Listeners\Backend\Collection\CollectionEventListener::class,
        \App\Listeners\Backend\News\NewsEventListener::class,
        \App\Listeners\Backend\Zone\ZoneEventListener::class,
        \App\Listeners\Backend\Good\GoodEventListener::class,
        \App\Listeners\Backend\Showroom\ShowroomEventListener::class,
        \App\Listeners\Backend\FinishTissue\FinishTissueEventListener::class,
        \App\Listeners\Backend\Popup\PopupEventListener::class,
        \App\Listeners\Backend\TemplateMessage\TemplateMessageEventListener::class,


    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
