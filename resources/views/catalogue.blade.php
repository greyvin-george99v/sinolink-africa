@extends('layouts.app')

@section('title', 'Catalogue')

@section('content')

{{-- Breadcrumb Section --}}
<section class="about-breadcrumb-hero">
    <div class="hero-overlay">
        <div class="hero-content">
            <h1>{!! __('Discover our exclusive <br> collection from China') !!}</h1>
            
            <div class="breadcrumb">
                <a href="{{ url('/') }}">{!! __('Home') !!}</a>
                <i class="fa-solid fa-chevron-right"></i>
                <span>{{ __('Catalogue') }}</span>
            </div>
        </div>
    </div>
</section>

{{-- Filter Section --}}
<section class="filter-wrapper">
    <div class="container-center">
        <form action="{{ route('catalogue') }}" method="GET" class="filter-bar">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('Search...') }}" class="f-input-search">
            
            <select name="brand" class="f-select">
                <option value="">{{ __('All Brands') }}</option>
                @foreach(['Audi', 'BMW', 'Changan', 'Haval', 'Lexus', 'Suzuki', 'Toyota', 'Volkswagen'] as $brand)
                    <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>{{ $brand }}</option>
                @endforeach
            </select>

            <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="{{ __('Min Price') }}" class="f-input">
            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="{{ __('Max Price') }}" class="f-input">

            <select name="sort" class="f-select">
                <option value="">{{ __('Sort by') }}</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>{{ __('Price Increasing') }}</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>{{ __('Price Descending') }}</option>
                <option value="year_new" {{ request('sort') == 'year_new' ? 'selected' : '' }}>{{ __('Recent year') }}</option>
                <option value="year_old" {{ request('sort') == 'year_old' ? 'selected' : '' }}>{{ __('Old Model') }}</option>
            </select>

            <button type="submit" class="f-btn-filter">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="black">
                    <path d="M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z"></path>
                </svg>
            </button>
        </form>
    </div>
</section>

<div class="catalogue-container">
    <div class="catalogue-grid">
        {{-- Loop through Database Objects --}}
        @if($vehicles->count() > 0)
            @foreach ($vehicles as $car)
                <div class="car-card">
                    <div class="car-card-top">
                        {{-- Image from public/images/ --}}
                        <img src="{{ asset('images/' . $car->image) }}" 
                             alt="{{ $car->name }}" 
                             class="car-img" 
                             onerror="this.src='{{ asset('images/default-car.jpg') }}'">
                        
                        <div class="price-pill">${{ number_format($car->price) }}</div>

                        {{-- SOLD OVERLAY: Appears only if admin marks car as sold --}}
                        @if($car->is_sold)
                            <div class="sold-overlay">
                                <span class="sold-badge">{{ __('VENDU') }}</span>
                            </div>
                        @endif
                    </div>
                    
                    <div class="car-card-bottom">
                        <h3 class="car-name" title="{{ $car->name }}">{{ __($car->name) }}</h3>
                        
                        <div class="car-meta">
                            <div class="meta-item">
                                <i class="fa-regular fa-calendar yellow-icon"></i> 
                                {{ $car->year }}
                            </div>
                            <div class="meta-item">
                                <i class="fa-solid fa-gauge-high yellow-icon"></i> 
                                {{ $car->km }}
                            </div>
                            <div class="meta-item">
                                <i class="fa-solid fa-gas-pump yellow-icon"></i> 
                                {{ __($car->fuel) }}
                            </div>
                        </div>

                        <p class="car-desc">
                            {{ \Illuminate\Support\Str::limit(__($car->desc), 90) }}
                        </p>
                        
                        <a href="{{ route('vehicles.show', $car->slug) }}" class="btn-details">{{ __('Voir les Détails') }}</a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="no-results-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <h2>{{ __('No results found') }}</h2>
                <p>{{ __('No vehicles found. Try changing your filters.') }}</p>
                <a href="{{ route('catalogue') }}" class="btn-clear">{{ __('Clear all filters') }}</a>
            </div>
        @endif
    </div>

    {{-- PAGINATION --}}
    <div class="admin-pagination-container">
        {{ $vehicles->links('pagination::bootstrap-4') }}
        <p class="pagination-info">
            Showing {{ $vehicles->firstItem() }} to {{ $vehicles->lastItem() }} of {{ $vehicles->total() }} results
        </p>
    </div>
</div>

<style>
    /* Card Top for Overlay */
    .car-card-top {
        position: relative;
        overflow: hidden;
    }

    /* Sold Badge Styling */
    .sold-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 5;
    }

    .sold-badge {
        background-color: #28a745;
        color: white;
        padding: 8px 25px;
        font-weight: 800;
        font-size: 1.1rem;
        transform: rotate(-15deg);
        border: 2px solid white;
        box-shadow: 0 4px 15px rgba(0,0,0,0.4);
        letter-spacing: 1px;
    }

    /* General Hover Fixes */
    .table-container a:hover, .table-container button:hover {
        transform: translateY(-2px);
        filter: brightness(0.9);
    }

    /* Pagination Styling */
    .admin-pagination-container {
        margin-top: 50px;
        padding-bottom: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    .admin-pagination-container .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        gap: 5px;
    }

    .admin-pagination-container .page-item .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        padding: 0 15px;
        border: 1px solid #dee2e6;
        background-color: #fff;
        color: #333;
        text-decoration: none;
        font-weight: 600;
        border-radius: 6px;
        transition: 0.3s;
    }

    .admin-pagination-container .page-item.active .page-link {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #000;
    }

    .admin-pagination-container .page-item .page-link:hover:not(.active) {
        background-color: #f8f9fa;
        border-color: #ffc107;
    }

    .pagination-info {
        font-size: 0.9rem;
        color: #666;
        margin-top: 5px;
    }
</style>
@endsection