<?php

namespace App\Listeners;

use App\Constants\Queue;
use App\Events\PersonDeleted as Event;
use App\Jobs\SendEmail;
use App\Mail\PersonDeleted as Mail;

class PersonDeletedListener
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
