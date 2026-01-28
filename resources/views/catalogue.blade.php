@extends('layouts.app')

@section('title', 'About Us - Sinolink')

@section('content')

@php
    $totalCars = 61; 
    $perPage = 20; 
    
    // Get current page from URL (?page=1), default to 1
    $currentPage = (int) request('page', 1);
    
    // Safety check: don't allow page 0 or page 100
    $totalPages = ceil($totalCars / $perPage);
    if ($currentPage < 1) $currentPage = 1;
    if ($currentPage > $totalPages) $currentPage = $totalPages;

    // Calculate the image range
    $start = ($currentPage - 1) * $perPage + 1;
    $end = min($start + $perPage - 1, $totalCars);
@endphp


<section class="about-breadcrumb-hero">
    <div class="hero-overlay">
        <div class="hero-content">
            <h1>Discover our exclusive</br> collection from China</h1>
            
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="fa-solid fa-chevron-right"></i>
                <span>Catalogue</span>
            </div>
        </div>
    </div>
</section>
<section class="filter-wrapper">
    <div class="container-center">
        <div class="filter-bar">
            <input type="text" placeholder="Search..." class="f-input-search">
            
            <select class="f-select">
                <option>All Brands</option>
                <option>Toyota</option>
                <option>Lexus</option>
            </select>

            <input type="number" placeholder="Min Price" class="f-input">
            <input type="number" placeholder="Max Price" class="f-input">

            <select class="f-select">
                <option>Sort by</option>
                <option>Price: Low to High</option>
                <option>Newest</option>
            </select>

            <button class="f-btn-search">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </button>
        </div>
    </div>
</section>

<div class="catalogue-container">

  <div class="catalogue-grid">
    @for ($i = 1; $i <= 12; $i++)
        <div class="car-card">
            <div class="car-card-top">
                {{-- Dynamic Image --}}
                <img src="{{ asset('images/Sinolink-' . $i . '.jpg') }}" alt="Car" class="car-img">
                
                {{-- Dynamic Price --}}
                <div class="price-pill">{{ $cars[$i]['price'] ?? '$5,000' }}</div>
            </div>
            
            <div class="car-card-bottom">
                {{-- Dynamic Name --}}
                <h3 class="car-name">{{ $cars[$i]['name'] ?? 'Toyota Highlander 2009 2.7L 2WD' }}</h3>
                
                <div class="car-meta">
                    <div class="meta-item">
                        <i class="fa-regular fa-calendar yellow-icon"></i> 
                        {{ $cars[$i]['year'] ?? '2008' }}
                    </div>
                    <div class="meta-item">
                        <i class="fa-solid fa-gauge-high yellow-icon"></i> 200,000 km
                    </div>
                    <div class="meta-item">
                        <i class="fa-solid fa-gas-pump yellow-icon"></i> 
                        {{ $cars[$i]['fuel'] ?? 'Essence' }}
                    </div>
                </div>

                <p class="car-desc">5-seater SUV equipped with airbags (driver/passenger, side, curtains and knees), anc...</p>
                
                <a href="#" class="btn-details">See details</a>
            </div>
        </div>
    @endfor
</div>
Why this is better for you right now:
One Change Fixes All: If you want to change the border-radius or the yellow icon color, you only change it once in the code above, and all 12 cards update.

Image Handling: It automatically looks for Sinolink-1.jpg, Sinolink-2.jpg, etc., matching your folder structure perfectly.

Cleanliness: Your file will be much easier to read in VS Code.

A Quick Layout Tip
Since you are using a 4-column grid, the names might get quite long. I noticed your car names have a lot of detail (e.g., "2.7L 2WD 5 Seater..."). To keep the cards looking aligned, you might want to add this to your CSS:

CSS
.car-name {
    height: 45px; /* Ensures all titles take up the same space */
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2; /* Limits title to 2 lines */
    -webkit-box-orient: vertical;
}
Would you like me to provide the full array for all 17 of your images so the names match the actual cars in your photos?  
</div>

@endsection