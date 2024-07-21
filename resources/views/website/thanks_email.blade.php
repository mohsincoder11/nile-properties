<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Plot Inquiry</title>
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
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            font-size: 18px;
            color: #333333;
        }

        p {
            font-size: 14px;
            color: #555555;
            margin: 8px 0;
        }

        .footer {
            margin-top: 15px;
            padding-top: 10px;
            border-top: 1px solid #dddddd;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Thank You for Your Plot Inquiry</h1>

        <p>Dear {{ $authenticatedUser['name'] }},</p>

        <p>Thank you for your plot inquiry with plot number {{ $enquiry->plot_no->plot_no}}.
            Our team is reviewing your request and will reach out shortly with more details.
            Feel free to reply to this email if you have any specific preferences or questions.</p>

        <div class="footer">
            <p><strong>Best Regards</strong></p>
            <p>Team, Nile Properties</p>
        </div>
    </div>
</body>

</html>
