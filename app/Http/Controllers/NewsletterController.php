<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
}
