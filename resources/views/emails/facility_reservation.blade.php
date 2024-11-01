<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Facility Reservation</title>
</head>
<body>
    <h2>New Facility Reservation</h2>
    <p>Hello {{ $admin->name }},</p>

    <p>A new facility reservation has been made with the following details:</p>

    <ul>
        <li><strong>User Name:</strong> {{ $reservation->user->name }}</li>
        <li><strong>Facility Name:</strong> {{ $reservation->facility->name }}</li>
        <li><strong>Reservation Date:</strong> {{ $reservation->appt_date->format('F j, Y') }}</li>
        <li><strong>Time Slot:</strong> {{ $reservation->appt_start_time }} - {{ $reservation->appt_end_time }}</li>
        <li><strong>Fee:</strong> ₱{{ number_format($reservation->fee, 2) }}</li>
    </ul>

    <p>Thank you,</p>
    <p>Your System</p>
</body>
</html>
