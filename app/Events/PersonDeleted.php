<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PersonDeleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string
     */
    public $person;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $person)
    {
        $this->person = json_decode($person);
    }
}
