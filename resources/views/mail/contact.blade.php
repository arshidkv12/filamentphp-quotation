<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Quotation</title>
    <style>
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
            <p>You have received new contact submission</p>
            <p>Name : {{$contact->name}}</p>
            <p>Email : {{$contact->email}}</p>
            <p>Mob : {{$contact->phone}}</p>
            <p>Message : {{$contact->message}}</p>
            <br/>
            <p>Best regards,</p>
            <p>{{config('app.name')}}</p>
        </div>
        
    </div>
</body>

</html>