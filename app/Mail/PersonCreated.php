<?php

namespace App\Mail;

use App\Models\People;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PersonCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var People
     */
    public $person;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(People $person)
    {
        $this->person = $person;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.person-created')
            ->to($this->person->email)
            ->with([
                'person' => $this->person,
            ]);
    }
}
