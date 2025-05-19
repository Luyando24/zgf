<?php

namespace App\Services;

use App\Mail\NewsletterMail;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;

class NewsletterService
{
    public function sendToSubscriber(
        NewsletterSubscriber $subscriber,
        string $subject,
        string $content
    ): bool {
        try {
            Mail::to($subscriber->email)
                ->send(new NewsletterMail(
                    $subject,
                    $content,
                    $subscriber
                ));
            return true;
        } catch (\Exception $e) {
            \Log::error('Newsletter send failed', [
                'subscriber' => $subscriber->email,
                'error' => $e->getMessage()
            ]);
            return false;
        }
    }
}