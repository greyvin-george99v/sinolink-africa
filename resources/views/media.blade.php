@extends('layouts.app')

@section('title', 'Media')

@section('content')
<section class="media-breadcrumb-hero">
    <div class="hero-overlay">
        <div class="hero-content">
            <h1>Gallery</h1>
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="fa-solid fa-chevron-right"></i>
                <span>Gallery</span>
            </div>
        </div>
    </div>
</section>

<section class="gallery-section reveal">
    <div class="container">
        <div class="gallery-header">
            <div class="badge-red-soft">MEDIA</div>
            <h2 class="figma-title">Our Work in Action</h2>
            <p class="figma-subtitle">From sourcing to delivery, see how we connect China to Africa.</p>
        </div>

        <div class="gallery-grid">
            <div class="gallery-item" onclick="openLightbox('{{ asset('images/Santa_Fe_Hybrid.webp') }}')">
                <img src="{{ asset('images/Santa_Fe_Hybrid.webp') }}" alt="Work Action 1">
                <div class="img-overlay"><i class="fa-solid fa-expand"></i></div>
            </div>
            <div class="gallery-item" onclick="openLightbox('{{ asset('images/services.jpg') }}')">
                <img src="{{ asset('images/services.jpg') }}" alt="Work Action 2">
                <div class="img-overlay"><i class="fa-solid fa-expand"></i></div>
            </div>
            <div class="gallery-item" onclick="openLightbox('{{ asset('images/jet-dash-1.avif') }}')">
                <img src="{{ asset('images/jet-dash-1.avif') }}" alt="Work Action 3">
                <div class="img-overlay"><i class="fa-solid fa-expand"></i></div>
            </div>
            <div class="gallery-item" onclick="openLightbox('{{ asset('images/truck.jpg') }}')">
                <img src="{{ asset('images/truck.jpg') }}" alt="Work Action 4">
                <div class="img-overlay"><i class="fa-solid fa-expand"></i></div>
            </div>
            <div class="gallery-item" onclick="openLightbox('{{ asset('images/-F3000-tractor-truck5-114238.jpg') }}')">
                <img src="{{ asset('images/-F3000-tractor-truck5-114238.jpg') }}" alt="Work Action 5">
                <div class="img-overlay"><i class="fa-solid fa-expand"></i></div>
            </div>
            <div class="gallery-item" onclick="openLightbox('{{ asset('images/toyota-land-cruiser-prado-matte-black-edition.webp') }}')">
                <img src="{{ asset('images/toyota-land-cruiser-prado-matte-black-edition.webp') }}" alt="Work Action 6">
                <div class="img-overlay"><i class="fa-solid fa-expand"></i></div>
            </div>
            <div class="gallery-item" onclick="openLightbox('{{ asset('images/2021-hyundai-santa-fe_100764928.jpg') }}')">
                <img src="{{ asset('images/2021-hyundai-santa-fe_100764928.jpg') }}" alt="Work Action 7">
                <div class="img-overlay"><i class="fa-solid fa-expand"></i></div>
            </div>
            <div class="gallery-item" onclick="openLightbox('{{ asset('images/ford-ranger-2022-front-angle-low-view-494503.avif') }}')">
                <img src="{{ asset('images/ford-ranger-2022-front-angle-low-view-494503.avif') }}" alt="Work Action 8">
                <div class="img-overlay"><i class="fa-solid fa-expand"></i></div>
            </div>
            <div class="gallery-item" onclick="openLightbox('{{ asset('images/images (4).jfif') }}')">
                <img src="{{ asset('images/images (4).jfif') }}" alt="Work Action 9">
                <div class="img-overlay"><i class="fa-solid fa-expand"></i></div>
            </div>
        </div>
    </div>
</section>

<div id="galleryLightbox" class="lightbox" onclick="closeLightbox()">
    <span class="close-lightbox">&times;</span>
    <img class="lightbox-content" id="lightboxImg">
</div>

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
            <a href="{{ url('/contact') }}"  class="btn-coverage">Send Your City for Price</a>
        </div>

    </div>
</section>

@endsection