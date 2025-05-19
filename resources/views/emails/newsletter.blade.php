<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style>
        /* Reset styles for email clients */
        body {
            margin: 0;
            padding: 0;
            background-color: #f6f9fc;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
        }
        
        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .content {
            padding: 30px 20px;
        }
        
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #f0f0f0;
            margin-top: 30px;
        }
        
        .unsubscribe {
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #666;
        }
        
        .unsubscribe a {
            color: #666;
            text-decoration: underline;
        }
        
        /* Responsive design */
        @media only screen and (max-width: 620px) {
            .container {
                width: 100% !important;
                padding: 10px !important;
            }
            
            .content {
                padding: 15px 10px !important;
            }
        }
        
        /* Image responsiveness */
        img {
            max-width: 100%;
            height: auto;
        }
        
        /* Link styling */
        a {
            color: #3869D4;
            text-decoration: none;
        }
        
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="color: #2d3748; margin: 0;">{{ config('app.name') }}</h1>
        </div>
        
        <div class="content">
            {!! $content !!}
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
        
        <div class="unsubscribe">
            <p>
                If you no longer wish to receive these emails, you can 
                <a href="{{ $unsubscribeLink }}">unsubscribe here</a>
            </p>
        </div>
    </div>
</body>
</html>
