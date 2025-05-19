<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Abuse Report Received</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #61A534;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 5px 5px;
        }
        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Abuse Report Received</h1>
    </div>
    
    <div class="content">
        <div class="alert">
            <p><strong>Action Required:</strong> A new abuse report has been submitted and requires review.</p>
        </div>
        
        <p><strong>Report Details:</strong></p>
        <ul>
            <li><strong>Reference Number:</strong> REP-{{ $report->id }}-{{ $report->created_at->format('Ymd') }}</li>
            <li><strong>Subject:</strong> {{ $report->subject }}</li>
            <li><strong>Type:</strong> {{ ucfirst(str_replace('_', ' ', $report->report_type)) }}</li>
            <li><strong>Location:</strong> {{ $report->location }}</li>
            <li><strong>Submitted:</strong> {{ $report->created_at->format('F j, Y, g:i a') }}</li>
            <li><strong>Anonymous:</strong> {{ $report->is_anonymous ? 'Yes' : 'No' }}</li>
        </ul>
        
        @if(!$report->is_anonymous)
        <p><strong>Reporter Information:</strong></p>
        <ul>
            <li><strong>Name:</strong> {{ $report->name }}</li>
            <li><strong>Email:</strong> {{ $report->email }}</li>
            <li><strong>Phone:</strong> {{ $report->phone ?: 'Not provided' }}</li>
        </ul>
        @endif
        
        <p><strong>Description:</strong></p>
        <p>{{ $report->description }}</p>
        
        @if($report->evidence_file)
        <p><strong>Evidence File:</strong> A file was attached to this report. Please log in to the admin dashboard to view it.</p>
        @endif
        
        <p>Please log in to the admin dashboard to review this report and take appropriate action.</p>
    </div>
    
    <div class="footer">
        <p>This is an automated message from your website's reporting system.</p>
        <p>&copy; {{ date('Y') }} Zambia Governance Foundation. All rights reserved.</p>
    </div>
</body>
</html>