<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RejectVerificationMail extends Mailable
{
    use Queueable, SerializesModels;


    public $name;
    public $email;
    public $phone_number;
    public $text;
        

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $phone_number, $text)
    {
        $this->name = $name;
        $this->email = $email;
       $this->phone_number = $phone_number;
        $this->text = $text;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS')),
            subject: 'Reject :: Verification Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.reject',
            with: ['name' => $this->name,
                   'email' => $this->email,
                   'phone_number' => $this->phone_number,
                   'text' => $this->text,

            ]
        );
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
