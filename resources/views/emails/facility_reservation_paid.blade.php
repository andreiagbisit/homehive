<!DOCTYPE html>
<html>
<head>
    <title>Facility Reservation Update</title>
</head>
<body>
    <h2>Hello {{ $reservation->user->name }},</h2>

    <p>We’re pleased to inform you that your reservation for {{ $reservation->facility->name }} on {{ $reservation->appt_date->format('F j, Y') }} from {{ $reservation->appt_start_time }} to {{ $reservation->appt_end_time }} has been marked as <strong>PAID</strong>.</p>

    <p>Thank you for your reservation. We look forward to seeing you!</p>

    <p>Best regards,<br>
    The Facility Management Team</p>
</body>
</html>
