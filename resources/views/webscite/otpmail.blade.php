<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Email</title>
</head>

<body>
    <p>Dear user,</p>

    <p>Your One-Time Password (OTP) for password reset is: <strong>{{ $otp }}</strong></p>

    <p>Your email: {{ $email }}</p>


    <p>Please use this OTP to verify your identity and reset your password.</p>


    <p>Thank you!</p>
</body>

</html>