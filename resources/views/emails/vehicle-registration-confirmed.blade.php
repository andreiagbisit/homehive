<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Registration Confirmation</title>
</head>
<body>
    <h1>Dear {{ $application->registered_owner }},</h1>
    <p>We are pleased to inform you that your vehicle registration and payment have been confirmed.</p>
    <p><strong>Details:</strong></p>
    <ul>
        <li>Registered Vehicle Owner: {{ $application->registered_owner }}</li>
        <li>Vehicle Make: {{ $application->make }}</li>
        <li>Vehicle Plate Number: {{ $application->plate_no }}</li>
        <li>Payment Method: {{ $application->payment_mode_id == 1 ? 'GCash' : 'On-site Payment' }}</li>
    </ul>
    <p>Thank you for your prompt action.</p>
</body>
</html>
