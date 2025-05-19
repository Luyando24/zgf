<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;
use App\Models\NewsletterEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\Newsletter;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    // Existing methods...
    
    public function sendNewsletter(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        
        $subject = $request->subject;
        $content = $request->content;
        
        // Create a record of this newsletter
        $newsletterEmail = NewsletterEmail::create([
            'subject' => $subject,
            'content' => $content,
            'sent_at' => now(),
        ]);
        
        // Get all active subscribers
        $subscribers = NewsletterSubscriber::where('status', 'active')->get();
        
        $failedEmails = [];
        $successCount = 0;
        
        // Send to each subscriber with error handling
        foreach ($subscribers as $subscriber) {
            try {
                Log::info("Attempting to send newsletter to: " . $subscriber->email);
                
                Mail::to($subscriber->email)
                    ->send(new Newsletter($subject, $content));
                
                // Add a small delay to prevent rate limiting
                usleep(100000); // 100ms delay
                
                $successCount++;
                Log::info("Successfully sent newsletter to: " . $subscriber->email);
            } catch (\Exception $e) {
                Log::error("Failed to send newsletter to {$subscriber->email}: " . $e->getMessage());
                $failedEmails[] = [
                    'email' => $subscriber->email,
                    'error' => $e->getMessage()
                ];
            }
        }
        
        // Update the newsletter record with results
        $newsletterEmail->update([
            'total_sent' => $successCount,
            'total_failed' => count($failedEmails),
            'failed_details' => json_encode($failedEmails)
        ]);
        
        if (count($failedEmails) > 0) {
            return redirect()->back()->with('warning', "Newsletter sent to {$successCount} subscribers with {count($failedEmails)} failures. Check logs for details.");
        }
        
        return redirect()->back()->with('success', "Newsletter sent successfully to {$successCount} subscribers!");
    }
}