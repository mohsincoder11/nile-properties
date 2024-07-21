<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Enquiry Form Submission</title>
</head>
<body>
    <p>Hello Admin,</p>

    <p>A new enquiry form has been submitted with the following details:</p>

    <ul>
        <li><strong>Name:</strong> {{ $enquiry->name }}</li>
        <li><strong>Email:</strong> {{ $enquiry->email }}</li>
        <li><strong>Contact:</strong> {{ $enquiry->contact }}</li>
        <li><strong>Project Name:</strong> {{ $enquiry->project_name->project_name}}</li>
        <li><strong>Plot Number:</strong> {{ $enquiry->plot_no->plot_no}}</li>
        <li><strong>Message:</strong> {{ $enquiry->message }}</li>
    </ul>

    <p>Thank you.</p>
</body>
</html>
