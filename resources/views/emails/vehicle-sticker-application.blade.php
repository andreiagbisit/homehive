<h2>New Vehicle Sticker Application Submitted</h2>
<p>A new vehicle sticker registration has been submitted by {{ $application->user->name }}.</p>
<p><strong>Details:</strong></p>
<ul>
    <li>Registered Owner: {{ $application->registered_owner }}</li>
    <li>Vehicle Make: {{ $application->make }}</li>
    <li>Vehicle Series: {{ $application->series }}</li>
    <li>Vehicle Color: {{ $application->color }}</li>
    <li>Plate Number: {{ $application->plate_no }}</li>
    <li>Payment Method: {{ $application->payment_mode_id == 1 ? 'GCash' : 'On-site Payment' }}</li>
</ul>
