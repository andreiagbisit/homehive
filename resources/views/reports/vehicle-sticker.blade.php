<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Sticker Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Vehicle Sticker Applications Report - {{ date("F", mktime(0, 0, 0, $request->month, 1)) }} {{ $request->year }}</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Registered Vehicle Owner</th>
                <th>Vehicle Plate No.</th>
                <th>Application Fee Payment Status</th>
                <th>Mode of Payment</th>
                <th>Payment Collector</th>
                <th>Date of Payment</th>
                <th>Fee</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
            <tr>
                <td>{{ $application->id }}</td>
                <td>{{ $application->registered_owner }}</td>
                <td>{{ $application->plate_no }}</td>
                <td>{{ $application->status == 1 ? 'PAID' : 'PENDING' }}</td>
                <td>{{ $application->payment_mode_id == 1 ? 'GCash' : 'On-site Payment' }}</td>
                <td>{{ $application->collector->name ?? 'N/A' }}</td>
                <td>{{ $application->date_of_payment ? $application->date_of_payment->format('m/d/Y') : 'N/A' }}</td>
                <td>₱{{ number_format($application->fee, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p><strong>Total Fee:</strong> ₱{{ number_format($totalFee, 2) }}</p>
</body>
</html>
