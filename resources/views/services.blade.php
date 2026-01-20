@extends('layouts.app')

@section('title', 'Services')

@section('content')
<section class="services-breadcrumb-hero">
    <div class="hero-overlay">
        <div class="hero-content">
            <h1>Services</h1>
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="fa-solid fa-chevron-right"></i>
                <span>Services</span>
            </div>
        </div>
    </div>
</section>

<section class="services-page-grid reveal">
    <div class="container">
        <div class="services-header">
            <span class="badge-yellow">What We Do</span>
            <h2 class="figma-title">End-to-End Vehicle Sourcing & Logistics</h2>
            <p class="figma-subtitle">From manufacturer to your doorstep, we handle every step of the journey.</p>
        </div>

        <div class="services-grid-wrapper">
            <div class="service-item-card reveal">
                <div class="yellow-icon-box">
                    <i class="fa-solid fa-car-side"></i>
                </div>
                <h3>ATV & Vehicle Sourcing</h3>
                <p>Direct procurement from verified Chinese manufacturers with competitive pricing and quality assurance.</p>
            </div>

            <div class="service-item-card reveal">
                <div class="yellow-icon-box">
                    <i class="fa-solid fa-clipboard-check"></i>
                </div>
                <h3>Quality Inspection</h3>
                <p>Rigorous pre-shipment inspections to ensure every vehicle meets your specifications and standards.</p>
            </div>

            <div class="service-item-card reveal">
                <div class="yellow-icon-box">
                    <i class="fa-solid fa-ship"></i>
                </div>
                <h3>Shipping & Logistics</h3>
                <p>Seamless sea and air freight solutions with real-time tracking from China to African ports.</p>
            </div>

            <div class="service-item-card reveal">
                <div class="yellow-icon-box">
                    <i class="fa-solid fa-truck-moving"></i>
                </div>
                <h3>Bulk & Fleet Orders</h3>
                <p>Custom sourcing solutions for businesses, government agencies, and NGOs at negotiated rates.</p>
            </div>

            <div class="service-item-card reveal">
                <div class="yellow-icon-box">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                </div>
                <h3>Customs Clearance</h3>
                <p>Handling documentation, duties, and compliance to ensure smooth clearance at destination ports.</p>
            </div>

            <div class="service-item-card reveal">
                <div class="yellow-icon-box">
                    <i class="fa-solid fa-comments-dollar"></i>
                </div>
                <h3>Pricing Consultation & Quotes</h3>
                <p>Professional guidance on vehicle valuation and total landed cost estimates before you purchase.</p>
            </div>
        </div>
    </div>
</section>

<section class="mission-section">
    <div class="mission-overlay">
        <div class="container">
            <div class="mission-content">
                <h2 class="mission-title">Our Mission</h2>
                <p class="mission-text">
                    To simplify vehicle and ATV sourcing across Africa by delivering reliable, 
                    transparent, and end-to-end import solutions from China, enabling 
                    individuals and businesses to access quality vehicles with confidence and ease.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="values-section">
    <div class="container">
        <div class="values-header">
            <h2 class="figma-title">Our Values</h2>
            <p class="figma-subtitle">
                We define our commitment to trust, transparency, and excellence, ensuring<br class="desktop-only">
                every partnership is built on reliability, accountability, and long-term success.
            </p>
        </div>

        <div class="values-grid">
            <div class="value-card reveal">
                <div class="value-top">
                    <div class="value-icon-box">
                        <i class="fa-solid fa-earth-africa"></i>
                    </div>
                    <h3>Pan-African Reach</h3>
                </div>
                <p>We are dedicated to connecting African cities and markets through strong regional presence and localized expertise.</p>
            </div>

            <div class="value-card reveal">
                <div class="value-top">
                    <div class="value-icon-box">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h3>Transparency</h3>
                </div>
                <p>We believe in clear communication, honest pricing, and full visibility throughout the sourcing and delivery process.</p>
            </div>

            <div class="value-card reveal">
                <div class="value-top">
                    <div class="value-icon-box">
                        <i class="fa-solid fa-handshake-angle"></i>
                    </div>
                    <h3>Customer Commitment</h3>
                </div>
                <p>Our clients’ success is our priority. We provide hands-on, agent-led support to ensure each customer receives personalized attention.</p>
            </div>

            <div class="value-card reveal">
                <div class="value-top">
                    <div class="value-icon-box">
                        <i class="fa-solid fa-users-gear"></i>
                    </div>
                    <h3>Partnership</h3>
                </div>
                <p>We build long-term relationships with trusted manufacturers and logistics partners to create sustainable value across markets.</p>
            </div>

            <div class="value-card reveal">
                <div class="value-top">
                    <div class="value-icon-box">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h3>Reliability</h3>
                </div>
                <p>We commit to consistent, dependable service at every stage so our clients can trust us with high-value decisions.</p>
            </div>

            <div class="value-card reveal">
                <div class="value-top">
                    <div class="value-icon-box">
                        <i class="fa-solid fa-bolt-lightning"></i>
                    </div>
                    <h3>Efficiency</h3>
                </div>
                <p>We streamline complex cross-border logistics into a smooth, well-managed process that saves time and reduces risk.</p>
            </div>
        </div>
    </div>
</section>



@endsection