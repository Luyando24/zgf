<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        NewsletterSubscriber::create([
            'email' => $request->email,
        ]);

        return back()->with('success', 'Thank you for subscribing!');
    }
    
    public function unsubscribe($token)
    {
        try {
            $email = base64_decode($token);
            
            // Validate that this is actually an email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return view('newsletter.unsubscribe', [
                    'error' => 'Invalid unsubscribe link.'
                ]);
            }
            
            $subscriber = NewsletterSubscriber::where('email', $email)->first();
            
            if (!$subscriber) {
                return view('newsletter.unsubscribe', [
                    'error' => 'Email not found in our subscription list.',
                    'email' => $email
                ]);
            }
            
            return view('newsletter.unsubscribe', [
                'email' => $email,
                'token' => $token
            ]);
        } catch (\Exception $e) {
            return view('newsletter.unsubscribe', [
                'error' => 'Invalid unsubscribe link.'
            ]);
        }
    }
    
    public function confirmUnsubscribe(Request $request)
    {
        try {
            $email = base64_decode($request->token);
            
            // Validate that this is actually an email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return view('newsletter.unsubscribe', [
                    'error' => 'Invalid unsubscribe link.'
                ]);
            }
            
            $subscriber = NewsletterSubscriber::where('email', $email)->first();
            
            if ($subscriber) {
                $subscriber->delete();
                return view('newsletter.unsubscribe-success', [
                    'email' => $email
                ]);
            }
            
            return view('newsletter.unsubscribe', [
                'error' => 'Email not found in our subscription list.',
                'email' => $email
            ]);
        } catch (\Exception $e) {
            return view('newsletter.unsubscribe', [
                'error' => 'Invalid unsubscribe link.'
            ]);
        }
    }
    
    public function send(Newsletter $newsletter)
    {
        if ($newsletter->review_status !== 'approved') {
            return back()->with('error', 'Newsletter must be approved before sending.');
        }
        
        // ... existing sending logic ...
    }
}


