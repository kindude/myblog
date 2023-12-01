<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Text;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $emailContent;


    /**
     * Create a new message instance.
     */
    public function __construct($subject, $emailContent, $sender)
    {
        $this->sender = $sender;
        $this->subject = $subject;
        $this->emailContent = $emailContent;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
            from: $this->sender,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {


        $content = new Content(
             view: 'email.email-template',
        );
        $content->with([
            'sender'=> $this->sender,
            'subject' => $this->subject,
            'emailContent' => $this->emailContent,
        ]);

        return $content;
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
