@extends('layouts.app')

@section('title', 'Vehicle Details')

@section('content')

<div class="vehicle-details-page">
    <div class="container-center">
    <nav class="breadcrumb-container">
        <a href="/">{{ __('Home') }}</a>
        <i class="fa-solid fa-chevron-right"></i>
        <a href="/catalogue" class="bold">{{ __('Catalogue') }}</a>
        <i class="fa-solid fa-chevron-right"></i>
        <span class="active-item">{{ $vehicle['name'] }}</span>
    </nav>

    <div class="details-grid">
    <div class="main-content">
        <div class="hero-image-wrapper">
            <img src="{{ asset('images/' . $vehicle['image']) }}" alt="{{ $vehicle['name'] }}">
        </div>

        <div class="info-section">
            <div class="content-block">
                <div class="section-label">{{ __('Description') }}</div>
                <p class="description-text">
                    {{ $vehicle['desc'] ?: 'No description available. Contact us for full specifications.' }}
                </p>
            </div>

            <div class="content-block">
                <div class="section-label">{{ __('Overview') }}</div>
                <div class="overview-items">
                    <div class="ov-item">
                        <label>{{ __('Year') }}</label>
                        <span>{{ $vehicle['year'] }}</span>
                    </div>
                    <div class="ov-item">
                        <label>{{ __('Color') }}</label>
                        <span>{{ $vehicle['color'] }}</span>
                    </div>
                    <div class="ov-item">
                        <label>{{ __('Mileage') }}</label>
                        <span>{{ $vehicle['km'] }}</span>
                    </div>
                    <div class="ov-item">
                        <label>{{ __('Fuel') }}</label>
                        <span>{{ $vehicle['fuel'] }}</span>
                    </div>
                    <div class="ov-item">
                        <label>{{ __('Transmission') }}</label>
                        <span>{{ $vehicle['trans'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <aside class="sidebar">
        <div class="sidebar-card price-card">
            {{-- Year Badge at the top --}}
            <div class="year-badge">{{ $vehicle['year'] }}</div>
            <h2 class="vehicle-title">{{ $vehicle['name'] }}</h2>
            <div class="price-container">
                <label>{{ __('Car Price') }}</label>
                {{-- Formats the number with commas (e.g., 2915 to 2,915) --}}
                <div class="price-value">${{ number_format($vehicle['price']) }}</div>
            </div>
        </div>

        <div class="sidebar-card action-card">
            <h3 class="card-title">{{ __('Speak with an Agent') }}</h3>
    @php
        $referrer = session('referrer');
        $refText = $referrer ? ' (Referral Code: ' . $referrer . ')' : '';
        $fullMessage = __("I am interested in the") . " " . $vehicle['name'] . $refText;
    @endphp

            <a href="https://wa.me/254713688640?text={{ urlencode($fullMessage) }}" class="btn-whatsapp" target="_blank">
                <i class="fa-brands fa-whatsapp"></i> {{ __('Order on Whatsapp') }}
            </a>
            <a href="{{ route('catalogue') }}" class="btn-outline-yellow">
                <i class="fa-solid fa-arrow-left-long"></i>{{ __('Return to Catalogue') }}</a>
        
            <div class="contact-info">
                <h3 class="card-title mt-4">{{ __('Quick Contact') }}</h3>
                <div class="contact-row">
                    <div class="icon-circle-extra"><i class="fa-solid fa-phone"></i></div>
                    <div class="text-group">
                        <p>(+254) 713 688 640</p>
                        <a href="mailto:info@sinolink.africa">info@sinolink.africa</a>
                    </div>
                </div>
                <div class="contact-row">
                    <div class="icon-circle-extra"><i class="fa-solid fa-clock"></i></div>
                    <div class="text-group">
                        <p>{{ __('Mon - Fri: 8:00 to 17:00') }}</p>
                        <p>({{ __('Saturday & Sunday Closed') }})</p>
                    </div>
                </div>
            </div>   
        </div>
    </aside>

</div>
</div>

@endsection