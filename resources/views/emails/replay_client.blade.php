<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .welcome {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }
        .farewell {
            font-size: 18px;
            color: #666;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <p class="welcome">Hello, {{ $client }}</p>
    <p>Your request has been sent successfully. I will contact you immediately when I see the message</p>
    <p class="farewell">Thank you for your time and consideration.<br>Best regards,<br>Yousef Saleh</p>
</body>
</html>
