<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thank You for Your Volunteer Application</title>
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
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 5px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('images/logo.png') }}" alt="ZGF Logo" class="logo">
        <h1>Thank You for Your Volunteer Application</h1>
    </div>
    
    <div class="content">
        <p>Dear {{ $volunteer->name }},</p>
        
        <p>Thank you for your interest in volunteering with the Zambia Governance Foundation. We have received your application and appreciate your willingness to contribute to our mission.</p>
        
        <p>Here's what happens next:</p>
        <ol>
            <li>Our team will review your application</li>
            <li>We'll contact you to discuss potential volunteer opportunities that match your skills and interests</li>
            <li>If there's a good fit, we'll schedule an orientation session</li>
        </ol>
        
        <p>If you have any questions in the meantime, please don't hesitate to contact us at <a href="mailto:info@zgf.org.zm">info@zgf.org.zm</a>.</p>
        
        <p>Thank you again for your interest in supporting our work!</p>
        
        <p>Warm regards,<br>
        The ZGF Team</p>
    </div>
    
    <div class="footer">
        <p>Zambia Governance Foundation | Plot No. 36C Sable Road, Kabulonga, Lusaka | www.zgf.org.zm</p>
        <p>This email was sent to {{ $volunteer->email }}</p>
    </div>
</body>
</html>