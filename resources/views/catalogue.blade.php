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
    @foreach ($vehicles as $id => $car)
    <div class="car-card">
        <div class="car-card-top">
            <img src="{{ asset('images/' . ($car['image'] ?? 'Sinolink-' . $id . '.jpg')) }}" alt="Car" class="car-img">
            <div class="price-pill">${{ number_format($car['price'] ?? 5000) }}</div>
        </div>
        
        <div class="car-card-bottom">
            {{-- Dynamic Name from your array --}}
            <h3 class="car-name">{{ $car['name'] ?? 'Toyota Highlander 2009' }}</h3>
            
            <div class="car-meta">
                <div class="meta-item">
                    <i class="fa-regular fa-calendar yellow-icon"></i> 
                    {{ $car['year'] ?? '2008' }}
                </div>
                <div class="meta-item">
                    <i class="fa-solid fa-gauge-high yellow-icon"></i> 
                    {{ $car['km'] ?? '200,000 km' }}
                </div>
                <div class="meta-item">
                    <i class="fa-solid fa-gas-pump yellow-icon"></i> 
                    {{ $car['fuel'] ?? 'Essence' }}
                </div>
            </div>

         
            <p class="car-desc">{{ \Illuminate\Support\Str::limit($car['desc'] ?? '5-seater SUV equipped with airbags...', 85) }}</p>
            
            
            <a href="{{ route('vehicle.details', ['id' => $id]) }}" class="btn-details">See details</a>
        </div>
    </div>
@endforeach

<div class="pagination-wrapper">
    {{ $vehicles->links() }}
</div>
</div>

</div>

@endsection