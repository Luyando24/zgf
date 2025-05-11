<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Mail;
use App\Mail\VolunteerRequestSubmitted;
use App\Mail\AdminVolunteerNotification;

class VolunteerController extends Controller
{
    public function index()
    {
        return view('volunteer');
    }

    public function submitVolunteerRequest(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'skills' => 'required|string',
            'availability' => 'required|string',
            'motivation' => 'required|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('volunteer_cvs', 'public');
            $validated['cv'] = $cvPath;
        }

        $volunteer = Volunteer::create($validated);

        // Send email to volunteer
        Mail::to($volunteer->email)->send(new VolunteerRequestSubmitted($volunteer));
        
        // Send email to admin
        Mail::to(config('mail.admin_address', 'admin@example.com'))->send(new AdminVolunteerNotification($volunteer));

        return redirect()->route('volunteer.thank-you');
    }

    public function thankYou()
    {
        return view('volunteer.thank-you');
    }
}