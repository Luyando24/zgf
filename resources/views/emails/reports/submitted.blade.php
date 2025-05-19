<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your Report Has Been Submitted</title>
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
        <h1>Your Report Has Been Submitted</h1>
    </div>
    
    <div class="content">
        <p>Dear {{ $report->name }},</p>
        
        <p>Thank you for submitting your report. We take all reports seriously and are committed to addressing issues of abuse and injustice.</p>
        
        <p><strong>Report Details:</strong></p>
        <ul>
            <li><strong>Subject:</strong> {{ $report->subject }}</li>
            <li><strong>Type:</strong> {{ ucfirst(str_replace('_', ' ', $report->report_type)) }}</li>
            <li><strong>Submitted:</strong> {{ $report->created_at->format('F j, Y, g:i a') }}</li>
            <li><strong>Reference Number:</strong> REP-{{ $report->id }}-{{ $report->created_at->format('Ymd') }}</li>
        </ul>
        
        <p>Our team will review your report and may contact you for additional information if necessary. Please keep this email for your records.</p>
        
        <p>If you have any questions or need to provide additional information, please contact us at <a href="mailto:support@zgf.org.zm">support@zgf.org.zm</a> and reference your report number.</p>
        
        <p>Thank you for your courage in speaking up.</p>
        
        <p>Sincerely,<br>
        The Zambia Governance Foundation Team</p>
    </div>
    
    <div class="footer">
        <p>This is an automated message. Please do not reply to this email.</p>
        <p>&copy; {{ date('Y') }} Zambia Governance Foundation. All rights reserved.</p>
    </div>
</body>
</html>