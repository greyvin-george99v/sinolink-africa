@extends('layouts.app')

@section('title', 'Coverage')

@section('content')
<section class="coverage-breadcrumb-hero">
    <div class="hero-overlay">
        <div class="hero-content">
            <h1>Coverage</h1>
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="fa-solid fa-chevron-right"></i>
                <span>Coverage</span>
            </div>
        </div>
    </div>
</section>

<section class="coverage-page-section reveal">
    <div class="container">
        <div class="coverage-header">
            <div class="badge-red-soft">AFRICA COVERAGE</div>
            <h2 class="figma-title">Pan-African Logistics Network</h2>
            <p class="coverage-description">
                Sinolink operates through regional offices and trusted logistics partners to deliver vehicles to multiple African cities efficiently and reliably. Our established network ensures your vehicles arrive safely, with full documentation and customs clearance handled at every step.
            </p>
        </div>

        <div class="map-visual-container reveal">
            <div class="ripple-background">
                <div class="circle outer-circle"></div>
                <div class="circle middle-circle"></div>
                <div class="circle inner-circle"></div>
            </div>
            <img src="{{ asset('images/Africa Map Sinolink.png') }}" alt="Africa Logistics Map" class="main-map-img">
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
            <div class="country-card">
                <img class="country-flag" src="https://flagcdn.com/w80/ke.png" alt="Kenya">
                <h3 class="country-name">Kenya</h3>
                <div class="city-list">
                    <div class="city-item"><span class="city-dot"></span>Nairobi</div>
                    <div class="city-item"><span class="city-dot"></span>Mombasa</div>
                </div>
            </div>
        
            <div class="country-card">
                <img class="country-flag" src="https://flagcdn.com/w80/cd.png" alt="DRC">
                <h3 class="country-name">DRC</h3>
                <div class="city-list">
                    <div class="city-item"><span class="city-dot"></span>Kinshasa</div>
                    <div class="city-item"><span class="city-dot"></span>Lubumbashi</div>
                </div>
            </div>
        
            <div class="country-card">
                <img class="country-flag" src="https://flagcdn.com/w80/tz.png" alt="Tanzania">
                <h3 class="country-name">Tanzania</h3>
                <div class="city-list">
                    <div class="city-item"><span class="city-dot"></span>Dar es Salaam</div>
                </div>
            </div>
        
            <div class="country-card">
                <img class="country-flag" src="https://flagcdn.com/w80/ao.png" alt="Angola">
                <h3 class="country-name">Angola</h3>
                <div class="city-list">
                    <div class="city-item"><span class="city-dot"></span>Luanda</div>
                </div>
            </div>
        
            <div class="country-card">
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
            <a href="#" class="btn-coverage">Send Your City for Price</a>
        </div>

    </div>
</section>
<section class="cta-section">
    <div class="cta__inner">
        
        <div class="cta-content">
            <h2 class="cta-heading">Ready to Source Your<br/>Next Vehicle or ATV?</h2>
            <p class="cta-description">
                Get started today with a free quote. Our team is ready to help<br/>
                you source, ship, and deliver your vehicles anywhere in East and Central Africa.
            </p>
        </div>

        <div class="cta-buttons">
            <a href="{{ url('/contact') }}" class="btn-primary">
             Contact an Agent
                <i class="fa-solid fa-arrow-up-right-from-square btn-icon"></i>
            </a>

            <a href="{{ url('/services') }}" class="btn-outline">
            View Services
            </a>
        </div>

    </div>
</section>
</div>

@endsection