<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .email-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        p {
            color: #666;
        }
        .attachment {
            margin-top: 20px;
        }
        .attachment a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h1>Email Details</h1>
        <p><strong>To:</strong> {{ $client->name }} &lt;{{ $sentmail->to_email }}&gt;</p>
        <p><strong>Subject:</strong> {{ $sentmail->subject }}</p>
        <p><strong>Message:</strong></p>
        <p>{{ $sentmail->message }}</p>
        
        @if($sentmail->file)
            <div class="attachment">
                <p><strong>Attachment:</strong> <a href="{{ asset('uploads/emails/' . $sentmail->file) }}" target="_blank">{{ $sentmail->file }}</a></p>
            </div>
        @endif
    </div>
</body>
</html>
