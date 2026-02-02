<p>You have a new inquiry from Sinolink Africa!</p>

<p><strong>Name:</strong> {{ $emailData->name }}</p>
<p><strong>Email:</strong> {{ $emailData->email }}</p>
<p><strong>Phone:</strong> {{ $emailData->phone }}</p>
<p><strong>Country:</strong> {{ $emailData->country }}</p>
<p><strong>Vehicle Type:</strong> {{ $emailData->vehicle_type }}</p>

<hr>
<p><strong>Message:</strong></p>
<p>{{ $emailData->user_message }}</p>

@if($emailData->affiliate_id)
    <p><small>Referrer ID: {{ $emailData->affiliate_id }}</small></p>
@endif