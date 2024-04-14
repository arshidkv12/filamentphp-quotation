<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Quotation</title>
    <style>
        /* Inline styles for simplicity, consider using CSS classes for larger templates */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f1f1f1;
            margin-top: 30px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 200px;
        }

        .message {
            padding: 20px;
            background-color: #ffffff;
        }

        .message p {
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        
        <div class="message">
            <p>Dear {{ $quote->name }},</p>
            <p>Thank you for your inquiry!</p>
            <p>Attached to this email, you will find the quote data in PDF format.</p>
            <br/>
            <p>Best regards,</p>
            <p>{{config('app.name')}}</p>
        </div>
        
    </div>
</body>

</html>