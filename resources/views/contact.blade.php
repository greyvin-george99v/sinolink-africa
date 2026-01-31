@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<section class="contact-breadcrumb-hero">
    <div class="hero-overlay">
        <div class="hero-content">
            <h1>Contacts</h1>
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="fa-solid fa-chevron-right"></i>
                <span>Contacts</span>
            </div>
        </div>
    </div>
</section>

<section class="contact-section reveal">
    <div class="container">
        <div class="contact-header">
            <div class="badge-red-soft">GET IN TOUCH</div>
            <h2 class="figma-title">Contact us Today</h2>
            <p class="figma-subtitle">Your gateway to excellence in Chinese manufacturing.</p>
        </div>

        <div class="contact-grid">
            <div class="contact-card">
                <div class="contact-icon-box">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <h3>Location</h3>
                <p>NO 10 Maizhuan Road, Lishui Town<br>Nanhai District, Foshan China</p>
            </div>

            <div class="contact-card">
                <div class="contact-icon-box">
                    <i class="fa-solid fa-phone-volume"></i>
                </div>
                <h3>Quick Contact</h3>
                <p>
                    Call on: <a href="tel:+254713688640" class="contact-link">(+254) 713 688640</a><br>
                    Mail at: <a href="mailto:info@sinolink.com" class="contact-link">info@sinolink.Africa</a>
                </p>
            </div>

            <div class="contact-card">
                <div class="contact-icon-box">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <h3>Office Hours</h3>
                <p>Mon - Fri: 8:00 to 17:00<br>(Saturday Sunday Closed)</p>
            </div>
        </div>
    </div>
</section>

<section class="inquiry-section reveal">
    <div class="container">
        <div class="inquiry-flex-wrapper">
            <div class="inquiry-content">
                <div class="contact-header-left">
                    <div class="badge-red-soft">GET IN TOUCH</div>
                    <h2 class="figma-title">Contact us Today</h2>
                    <p class="form-subtext">Your gateway to excellence in Chinese manufacturing.</p>
                </div>

                <form action="{{ route('inquiry.store') }}" method="POST" class="contact-form">
                    @csrf
                    @if(session('success'))
                        <div class="alert-success-custom" style="color: #28a745; margin-bottom: 20px; font-weight: bold;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert-danger-custom" style="color: #E1061B; margin-bottom: 20px;">
                            <ul style="list-style: none; padding: 0;">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-row">
                        <div class="form-group">
                            <label>Full Name*</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="John Doe" required>
                        </div>
                        <div class="form-group">
                            <label>Phone/Whatsapp*</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="+254..." required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Email Address*</label>
                            <input type="email" name="email" placeholder="john@example.com" required>
                        </div>
                        <div class="form-group">
                            <label>Country*</label>
                            <select name="country" required>
                                <option value="" disabled selected>Select country</option>
                                <option value="Kenya">Kenya</option>
                                <option value="DRC">DRC</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Zambia">Zambia</option>
                                </select>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label>Vehicle Type*</label>
                        <select name="vehicle_type" required>
                            <option value="" disabled selected>Select vehicle type</option>
                            <option value="SUV">SUV / Personal Car</option>
                            <option value="Truck">Heavy Duty Truck</option>
                            <option value="ATV">ATV / Off-road</option>
                        </select>
                    </div>

                    <div class="form-group full-width">
                        <label>Message</label>
                        <textarea name="message" rows="4" placeholder="How can we help you?"></textarea>
                    </div>

                    <button type="submit" class="btn-send-inquiry">Send Inquiry</button>
                </form>
            </div>

            <div class="inquiry-image">
                <img src="{{ asset('images/woman-having-online-meeting-work.jpg') }}" alt="Sinolink Logistics">
            </div>

        </div>
    </div>
</section>

<section class="contact-cta-section">
    <div class="cta__inner">
        
        <div class="cta-content reveal">
            <h2 class="cta-heading">Ready to Source Your<br/>Next Vehicle or ATV?</h2>
            <p class="cta-description">
                Get started today with a free quote. Our team is ready to help<br/>
                you source, ship, and deliver your vehicles anywhere in East and Central Africa.
            </p>
        </div>

        <div class="cta-buttons reveal">
            <a href="{{ url('/services') }}" class="btn-outline">
            View Services
            </a>
        </div>

    </div>
</section>
@endsection