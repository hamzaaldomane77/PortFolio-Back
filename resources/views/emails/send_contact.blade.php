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
    <p class="welcome">Hello,</p>
    <h3>{{ $title }}</h3>
    <p>{{ $content }}</p>
    <p class="farewell">GoodBy..</p>
</body>
</html>
