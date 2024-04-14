<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Request Is Received</title>
</head>
<body style="font-family: Arial, sans-serif;">

    <table cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; margin: auto; border-collapse: collapse;">
        <tr>
            <td style="padding: 20px; background-color: #f0f0f0; text-align: left;">
                <h2 style="margin-bottom: 0;">Quote Request Is Received</h2>
                <p style="margin-top: 5px;">Name: {{$quote->name}}</p>
                <p style="margin-top: 5px;">Company: {{$quote->company}}</p>
                <p style="margin-top: 5px;">Email: {{$quote->email}}</p>
                <p style="margin-top: 5px;">Mob: {{$quote->phone}}</p>
                <p style="margin-top: 5px;">Message: {{$quote->message}}</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <h3 style="margin-top: 0;">Order Details</h3>
                <table cellpadding="5" cellspacing="0" width="100%" style="border: 1px solid #ccc; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ccc; padding: 10px;">Product</th>
                            <th style="border: 1px solid #ccc; padding: 10px;">Unit</th>
                            <th style="border: 1px solid #ccc; padding: 10px;">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    @foreach($quote_items as $item)
                        <tr>
                            <td style="border: 1px solid #ccc; padding: 10px;">{{$item->name}}</td>
                            <td style="border: 1px solid #ccc; padding: 10px;">{{$item->product->unit}}</td>
                            <td style="border: 1px solid #ccc; padding: 10px;">{{$item->qty}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px; text-align: center;">
                <p style="margin-bottom: 0;">If you have any questions, feel free to contact us.</p>
                <p style="margin-top: 5px;">Thank you!</p>
            </td>
        </tr>
    </table>

</body>
</html>
