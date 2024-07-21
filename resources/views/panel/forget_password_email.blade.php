<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset OTP</title>
    <style>
        /* Reset default margin and padding */
        body,
        h1,
        p {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        strong {
            color: #000;
        }

        .footer {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Password Reset OTP</h1>
        <p>Hi,</p>
        <p>Your OTP for password reset is: <strong>{{ $otp }}</strong></p>
        <p>Please use this OTP to reset your password.</p>
        <p>If you didn't request this, you can safely ignore this email.</p>
        <div class="footer">
            <p>Regards,<br>Nile Properties Team</p>
        </div>
    </div>
</body>

</html>
