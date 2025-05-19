<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $subject }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 0;">
    <!-- Header with Logo -->
    <div style="background-color: #3366cc; text-align: center; padding: 20px 0;">
        <img src="{{ asset('images/logo.png') }}" alt="ZGF Logo" style="max-width: 180px; height: auto;">
    </div>
    
    <!-- Main Content -->
    <div style="padding: 30px 20px; background-color: #ffffff;">
        <h1 style="color: #3366cc; font-size: 24px; margin-top: 0; margin-bottom: 20px; text-align: center;">{{ $subject }}</h1>
        
        <div style="font-size: 16px; line-height: 1.6;">
            {!! $content !!}
        </div>
    </div>
    
    <!-- Footer -->
    <div style="background-color: #333; color: #fff; padding: 20px; text-align: center; font-size: 12px;">
        <p style="margin-bottom: 10px;">Zambia Governance Foundation | Plot No. 36C Sable Road, Kabulonga, Lusaka</p>
        <p style="margin-bottom: 0;">&copy; {{ date('Y') }} Zambia Governance Foundation. All rights reserved.</p>
    </div>
</body>
</html>