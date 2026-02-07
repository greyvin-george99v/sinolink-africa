@extends('layouts.app')

@section('content')
<section class="policy-header">
    <div class="container">
        <div class="badge-red-soft">{{ __('LEGAL') }}</div>
        <h1 class="figma-title">{{ __('Privacy Policy') }}</h1>
        <p class="figma-subtitle">{{ __('Last Updated: January 2026') }}</p>
    </div>
</section>

<section class="policy-content">
    <div class="container">
        <div class="policy-text-wrapper">
            <h3>{{ __('1. Introduction') }}</h3>
            <p>{{ __('Welcome to Sinolink. We respect your privacy and are committed to protecting your personal data. This privacy policy will inform you about how we look after your personal data when you visit our website and tell you about your privacy rights.') }}</p>

            <h3>{{ __('2. Data We Collect') }}</h3>
            <p>{{ __('When you use our inquiry forms or contact us via WhatsApp, we may collect:') }}</p>
            <ul>
                <li>{{ __('Identity Data (Name)') }}</li>
                <li>{{ __('Contact Data (Email address, Phone number, WhatsApp ID)') }}</li>
                <li>{{ __('Technical Data (IP address, browser type, location)') }}</li>
                <li>{{ __('Inquiry Data (Vehicle types and sourcing requirements)') }}</li>
            </ul>

            <h3>{{ __('3. How We Use Your Data') }}</h3>
            <p>{{ __('We use your information specifically to:') }}</p>
            <ul>
                <li>{{ __('Provide quotes for vehicle sourcing and logistics.') }}</li>
                <li>{{ __('Communicate with you regarding your inquiries.') }}</li>
                <li>{{ __('Improve our manufacturing and shipping services.') }}</li>
            </ul>

            <h3>{{ __('4. Data Security') }}</h3>
            <p>{{ __('We have put in place appropriate security measures to prevent your personal data from being accidentally lost, used, or accessed in an unauthorized way.') }}</p>

            <h3>{{ __('5. Contact Us') }}</h3>
            <p>{{ __('If you have any questions about this privacy policy or our privacy practices, please contact us at') }} <strong>info@sinolink.africa</strong>.</p>
        </div>
    </div>
</section>
@endsection