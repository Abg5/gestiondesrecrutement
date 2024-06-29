<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Teste extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
   public $details;
    public function __construct($details)
    {
        //
        $this->$details=$details;
    }



    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Teste',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'testeMail',
        );
    }
    public function build()
    { return
        $this->from('hello@example.com')
        ->to('aBG@GMAIL.com')
        ->subject('TESTE DE MAIL')
        ->view('testeMail');

    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
