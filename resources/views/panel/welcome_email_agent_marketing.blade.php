<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Nile Properties</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            font-size: 24px;
            color: #333333;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            color: #555555;
            margin: 10px 0;
        }

        strong {
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #dddddd;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to Nile Properties</h1>

        <p>Dear {{ $user->name }},</p>

        <p>Thank you for expressing your interest in Nile Properties. We're delighted to welcome you!</p>

        <p>Your account details:</p>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Username:</strong> {{ $user->username }}</p>
        <p><strong>Your Temporary Password:</strong> {{ $password }}</p>

        <p>We recommend changing your password after the first login for security reasons.</p>

        <p>Additionally, we appreciate your enquiry regarding plots. Our dedicated team will reach out to you shortly to
            provide more details and assist you further.</p>

        <div class="footer">
            <p><strong>Thank You and Happy Exploring!</strong></p>
            <p>Team, Nile Properties</p>
        </div>
    </div>
</body>

</html>
