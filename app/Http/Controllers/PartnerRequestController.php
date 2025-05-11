<?php

namespace App\Http\Controllers;
use App\Models\PartnerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PartnerRequestController extends Controller
{
    public function submitPartnerRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'partnership_type' => 'required|string|max:255',
            'message' => 'required|string',
            'document' => 'nullable|file|mimes:pdf|max:2048',
            'terms' => 'required|accepted',
        ]);

        $documentPath = null;
        if ($request->hasFile('document')) {
            // Get original file name
            $originalName = $request->file('document')->getClientOriginalName();
            
            // Sanitize filename to prevent issues
            $sanitizedName = Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . 
                             pathinfo($originalName, PATHINFO_EXTENSION);
            
            // Add a unique prefix to prevent overwriting files with the same name
            $uniquePrefix = Str::random(10) . '_';
            
            // Store with original filename but with unique prefix
            $documentPath = $request->file('document')->storeAs(
                'partner-requests', 
                $uniquePrefix . $sanitizedName, 
                'public'
            );
        }

        PartnerRequest::create([
            'name' => $request->name,
            'organization' => $request->organization,
            'email' => $request->email,
            'phone' => $request->phone,
            'partnership_type' => $request->partnership_type,
            'message' => $request->message,
            'document' => $documentPath,
        ]);

        return redirect()->back()->with('success', 'Partner request submitted successfully! We will get back to you soon.');
    }
    
    public function index()
    {
        return view('partnership-request');
    }
}




