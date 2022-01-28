<?php

namespace App\Providers;

use App\Events\PersonCreated;
use App\Events\PersonDeleted;
use App\Events\PersonUpdated;
use App\Listeners\PersonCreatedListener;
use App\Listeners\PersonDeletedListener;
use App\Listeners\PersonUpdatedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PersonCreated::class => [
            PersonCreatedListener::class,
        ],
        PersonUpdated::class => [
            PersonUpdatedListener::class,
        ],
        PersonDeleted::class => [
            PersonDeletedListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
