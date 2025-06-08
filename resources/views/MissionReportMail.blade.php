<div>
    <h1>Mission Report</h1>
    <p>Dear Sir,</p>
    <p>Your mission report has been generated successfully. Please find the details below:</p>

    <h2>Mission Details</h2>
    <ul>
        <li><strong>Mission Name:</strong> {{ $mission->name }}</li>
        <li><strong>Description:</strong> {{ $mission->description }}</li>
        <li><strong>Status:</strong> {{ $mission->status }}</li>
        <li><strong>Date:</strong> {{ $mission->created_at->format('Y-m-d H:i:s') }}</li>
    </ul>


    <p>Thank you for your dedication and hard work.</p>
    <p>Best regards,</p>
    <p>The Mission Team</p>
</div>