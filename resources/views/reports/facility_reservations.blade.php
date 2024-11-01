<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facility Reservations Report</title>
</head>
<body>
    <h1>Facility Reservations Report</h1>
    <p>Total Revenue for Selected Filters: ₱{{ number_format($totalRevenue, 2) }}</p>

    <table width="100%" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Applicant Name</th>
                <th>Facility</th>
                <th>Date of Reservation</th>
                <th>Fee</th>
                <th>Payment Status</th>
                <th>Date of Payment</th>
                <th>Time of Reservation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->user->full_name }}</td>
                    <td>{{ $reservation->facility->name }}</td>
                    <td>{{ $reservation->start_date->format('m/d/Y') }}</td>
                    <td>₱{{ number_format($reservation->fee, 2) }}</td>
                    <td>{{ $reservation->payment_status == 1 ? 'Paid' : 'Pending' }}</td>
                    <td>{{ $reservation->payment_date ? $reservation->payment_date->format('m/d/Y') : 'N/A' }}</td>
                    <td>{{ $reservation->appt_start_time }} - {{ $reservation->appt_end_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
