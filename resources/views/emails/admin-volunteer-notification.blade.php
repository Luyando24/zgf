<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Volunteer Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>New Volunteer Application Received</h1>
    
    <div class="content">
        <p>A new volunteer application has been submitted through the website. Here are the details:</p>
        
        <table>
            <tr>
                <th>Name</th>
                <td>{{ $volunteer->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $volunteer->email }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $volunteer->phone }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $volunteer->address }}</td>
            </tr>
            <tr>
                <th>Skills & Expertise</th>
                <td>{{ $volunteer->skills }}</td>
            </tr>
            <tr>
                <th>Availability</th>
                <td>{{ $volunteer->availability }}</td>
            </tr>
            <tr>
                <th>Motivation</th>
                <td>{{ $volunteer->motivation }}</td>
            </tr>
            <tr>
                <th>CV</th>
                <td>
                    @if($volunteer->cv)
                        <a href="{{ asset('storage/' . $volunteer->cv) }}">Download CV</a>
                    @else
                        No CV uploaded
                    @endif
                </td>
            </tr>
            <tr>
                <th>Submitted On</th>
                <td>{{ $volunteer->created_at->format('F j, Y, g:i a') }}</td>
            </tr>
        </table>
        
        <p>You can view and manage all volunteer applications in the admin dashboard.</p>
    </div>
</body>
</