<!DOCTYPE html>
<html>
<head>
    <title>Monthly Paid Households Report</title>
</head>
<body>
    <h2>Monthly Paid Households Report - {{ date('F Y', strtotime($month)) }}</h2>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Household Representative</th>
                <th>Amount Paid</th>
                <th>Category</th>
                <th>Payment Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->user->fname }} {{ $payment->user->mname ?? '' }} {{ $payment->user->lname }}</td> <!-- Household Representative -->
                <td>PHP {{ number_format($payment->fee, 2) }}</td>
                <td>{{ $payment->category->name ?? 'N/A' }}</td>
                <td>{{ $payment->pay_date->format('m/d/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
