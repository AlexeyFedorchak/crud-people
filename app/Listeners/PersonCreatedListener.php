<?php

namespace App\Listeners;

use App\Events\PersonCreated as Event;
use App\Mail\PersonCreated as Mail;
use App\Jobs\SendEmail;

class PersonCreatedListener
{
    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(Event $event)
    {
        SendEmail::dispatch(new Mail($event->person))
            ->onQueue('email-queue');
    }
}
