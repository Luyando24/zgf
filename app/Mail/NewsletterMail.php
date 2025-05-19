<?php

namespace App\Mail;

use App\Models\NewsletterSubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    protected string $emailContent;
    protected string $unsubscribeLink;

    /**
     * Create a new message instance.
     */
    public function __construct(string $subject, string $content, NewsletterSubscriber $subscriber)
    {
        $this->emailContent = $content;
        $this->unsubscribeLink = url('/newsletter/unsubscribe/' . $subscriber->getUnsubscribeToken());
        $this->subject = $subject;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.newsletter',
            with: [
                'content' => $this->emailContent,
                'unsubscribeLink' => $this->unsubscribeLink,
                'subject' => $this->subject
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