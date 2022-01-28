<?php

namespace App\Listeners;

use App\Constants\Queue;
use App\Events\PersonUpdated as Event;
use App\Mail\PersonUpdated as Mail;
use App\Jobs\SendEmail;

class PersonUpdatedListener
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
            ->onQueue(Queue::EMAIL_QUEUE);
    }
}
