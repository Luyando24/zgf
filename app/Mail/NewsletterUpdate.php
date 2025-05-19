<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public string $content;
    public string $subjectText;
    public string $unsubscribeLink;

    /**
     * Create a new message instance.
     */
    public function __construct(string $subjectText, string $content, string $email)
    {
        $this->subjectText = $subjectText;
        $this->content = $content;
        
        // Create a simple unsubscribe link without using route() function
        $token = base64_encode($email);
        $this->unsubscribeLink = url("/newsletter/unsubscribe/{$token}");
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject($this->subjectText)
                    ->view('emails.newsletter');
    }
}



