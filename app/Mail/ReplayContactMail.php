<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReplayContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $client;

    /**
     * Create a new message instance.
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    public function build()
    {
        return $this->subject('Trying to contact with Yousef')
                    ->view('emails.replay_client')
                    ->with(['client' => $this->client]);
    }
}
