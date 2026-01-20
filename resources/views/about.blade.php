@extends('layouts.app')

@section('title', 'About Us - Sinolink')

@section('content')
<section class="about-breadcrumb-hero">
    <div class="hero-overlay">
        <div class="hero-content">
            <h1>About Us</h1>
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="fa-solid fa-chevron-right"></i>
                <span>About Us</span>
            </div>
        </div>
    </div>
</section>

<section class="who-we-are reveal">
    <div class="container"> <div class="about-flex">
            <div class="about-text">
                <span class="who-badge">Who We Are</span>
                <h2>A Pan-African Company Simplifying Vehicle Sourcing</h2>
                <p>Sinolink is a pan-African vehicle sourcing and logistics company focused on simplifying the entire process of getting ATVs, motorbikes, and utility vehicles from China to Africa.</p>
                <p>We manage everything from supplier selection and quality inspection to shipping, customs clearance, and final delivery. Our goal is to make cross-border vehicle acquisition seamless, transparent, and stress-free for individuals, dealers, and businesses alike.</p>
            </div>

            <div class="about-image-wrapper">
                <div class="yellow-shape">
                    <img src="{{ asset('images/who-we-are.jpg') }}" alt="Who We Are">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="what-we-do-black reveal">
    <div class="container">
        <div class="header-content">
            <span class="badge-yellow">What We Do</span>
            <h2 class="title-white">End-to-End Vehicle Sourcing & Logistics</h2>
            <p class="subtitle-gray">From manufacturer to your doorstep, we handle every step of the journey.</p>
        </div>

        <div class="services-grid reveal">
            <div class="service-card">
                <div class="icon-square"><i class="fa-solid fa-car"></i></div>
                <h3>ATV & Vehicle Sourcing</h3>
                <p>Direct procurement from verified Chinese manufacturers with competitive pricing and quality assurance.</p>
            </div>

        <div class="services-grid reveal">
                <div class="icon-square"><i class="fa-solid fa-clipboard-check"></i></div>
                <h3>Quality Inspection</h3>
                <p>Rigorous pre-shipment inspections to ensure every vehicle meets your specifications and standards.</p>
            </div>

        <div class="services-grid reveal">
                <div class="icon-square"><i class="fa-solid fa-ship"></i></div>
                <h3>Shipping & Logistics</h3>
                <p>Seamless sea and air freight solutions with real-time tracking from China to African ports.</p>
            </div>

        <div class="services-grid reveal">
                <div class="icon-square"><i class="fa-solid fa-boxes-stacked"></i></div>
                <h3>Bulk & Fleet Orders</h3>
                <p>Custom sourcing solutions for businesses, government agencies, NGOs, and resellers requiring bulk or fleet vehicle orders.</p>
            </div>

        <div class="services-grid reveal">
                <div class="icon-square"><i class="fa-solid fa-file-contract"></i></div>
                <h3>Customs Clearance</h3>
                <p>Handling customs documentation, duties, and regulatory compliance to ensure smooth clearance at destination ports.</p>
            </div>

        <div class="services-grid reveal">
                <div class="icon-square"><i class="fa-solid fa-comments-dollar"></i></div>
                <h3>Pricing Consultation & Quotes</h3>
                <p>Professional guidance on vehicle valuation and total landed cost estimates before you commit to a purchase.</p>
            </div>
            
        </div>
    </div>
</section>

<section class="coverage reveal">
    <div class="coverage__inner">
        
        <div class="coverage-header">
            <div class="coverage-tag-box">
                <span class="coverage-tag">Coverage</span>
            </div>
            <h2 class="coverage-title">Where We Deliver</h2>
            <p class="coverage-subtitle">Pan-African presence with offices and delivery networks across East and Central Africa</p>
        </div>

        <div class="coverage-grid">
            <div class="country-card reveal">
                <img class="country-flag" src="https://flagcdn.com/w80/ke.png" alt="Kenya">
                <h3 class="country-name">Kenya</h3>
                <div class="city-list">
                    <div class="city-item"><span class="city-dot"></span>Nairobi</div>
                    <div class="city-item"><span class="city-dot"></span>Mombasa</div>
                </div>
            </div>
        
            <div class="country-card reveal">
                <img class="country-flag" src="https://flagcdn.com/w80/cd.png" alt="DRC">
                <h3 class="country-name">DRC</h3>
                <div class="city-list">
                    <div class="city-item"><span class="city-dot"></span>Kinshasa</div>
                    <div class="city-item"><span class="city-dot"></span>Lubumbashi</div>
                </div>
            </div>
        
            <div class="country-card reveal">
                <img class="country-flag" src="https://flagcdn.com/w80/tz.png" alt="Tanzania">
                <h3 class="country-name">Tanzania</h3>
                <div class="city-list">
                    <div class="city-item"><span class="city-dot"></span>Dar es Salaam</div>
                </div>
            </div>
        
            <div class="country-card reveal">
                <img class="country-flag" src="https://flagcdn.com/w80/ao.png" alt="Angola">
                <h3 class="country-name">Angola</h3>
                <div class="city-list">
                    <div class="city-item"><span class="city-dot"></span>Luanda</div>
                </div>
            </div>
        
            <div class="country-card reveal">
                <img class="country-flag" src="https://flagcdn.com/w80/zm.png" alt="Zambia">
                <h3 class="country-name">Zambia</h3>
                <div class="city-list">
                    <div class="city-item"><span class="city-dot"></span>Lusaka</div>
                    <div class="city-item"><span class="city-dot"></span>Ndola</div>
                </div>
            </div>
        </div>

        <div class="coverage-cta-banner">
            <h2 class="cta-title">Don't see your City?</h2>
            <p class="cta-text">Send us your location and we'll provide custom pricing for delivery to your area.</p>
            <a href="{{ url('/contact') }}" class="btn-coverage">Send Your City for Price</a>
        </div>

    </div>
</section>

@endsection