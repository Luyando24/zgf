<?php

namespace App\Http\Controllers;

use App\Models\AbuseReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AbuseReportSubmitted;
use App\Mail\AbuseReportReceived;

class AbuseReportController extends Controller
{
    /**
     * Show the form for creating a new report.
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created report in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => $request->is_anonymous ? 'nullable' : 'required|string|max:255',
            'email' => $request->is_anonymous ? 'nullable' : 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'location' => 'required|string|max:255',
            'report_type' => 'required|string|in:abuse,discrimination,corruption,human_rights_violation,environmental_issue,other',
            'subject' => 'required|string|max:255',
            'description' => 'required|string|min:50',
            'evidence_file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
            'is_anonymous' => 'sometimes|boolean',
            'ip_address' => 'nullable|string|max:45',
            'user_location' => 'nullable|string|max:255',
        ]);

        // Handle file upload
        if ($request->hasFile('evidence_file')) {
            $path = $request->file('evidence_file')->store('evidence_files', 'public');
            $validated['evidence_file'] = $path;
        }

        // Get IP address if not provided
        if (empty($validated['ip_address'])) {
            $validated['ip_address'] = $request->ip();
        }

        // Create the report (reference_number will be auto-generated via model boot method)
        $report = AbuseReport::create($validated);

        // Send confirmation email if not anonymous
        if (!$request->is_anonymous && $request->email) {
            Mail::to($request->email)->send(new AbuseReportSubmitted($report));
        }

        // Send notification to admin
        Mail::to(config('mail.admin_address', 'admin@example.com'))->send(new AbuseReportReceived($report));

        return redirect()->route('reports.thank-you')->with([
            'reference_number' => $report->reference_number,
            'status' => 'success',
            'message' => 'Your report has been submitted successfully.'
        ]);
    }

    /**
     * Display a thank you page after submission.
     */
    public function thankYou()
    {
        return view('reports.thank-you');
    }
}