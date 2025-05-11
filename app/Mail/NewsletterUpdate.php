<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class NewsletterUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public string $content;
    public string $subjectText;

    public function __construct(string $subjectText, string $content)
    {
        $this->subjectText = $subjectText;
        $this->content = $content;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subjectText,
        );
    }

    public function content(): Content
{
    return new Content(
        html: 'emails.newsletter',
        text: 'emails.newsletter_plain',
        with: [
            'content' => $this->content,
            'subjectText' => $this->subjectText,
        ],
    );
}

    public function attachments(): array
    {
        return [];
    }
}
