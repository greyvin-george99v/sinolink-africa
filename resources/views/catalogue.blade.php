@extends('layouts.app')

@section('title', __('Catalogue'))

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
        <form action="{{ route('catalogue') }}" method="GET" class="filter-bar" style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
            
            {{-- SEARCH INPUT WITH CLEAR BUTTON --}}
            <div style="position: relative; display: flex; align-items: center;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('Search...') }}" class="f-input-search">
                @if(request('search'))
                    <a href="{{ route('catalogue', request()->except('search')) }}" 
                       style="position: absolute; right: 10px; color: #e31e24; text-decoration: none; font-weight: bold; font-size: 0.8rem;">
                       {{ __('Clear') }}
                    </a>
                @endif
            </div>
            
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

            {{-- MASTER CLEAR ALL BUTTON --}}
            @if(request()->anyFilled(['search', 'brand', 'min_price', 'max_price', 'sort']))
                <a href="{{ route('catalogue') }}" class="f-btn-clear-all" style="color: #666; font-size: 0.85rem; text-decoration: underline;">
                    {{ __('Reset All') }}
                </a>
            @endif
        </form>
    </div>
</section>

<div class="catalogue-container">
    <div class="catalogue-grid">
        {{-- Loop through Database Objects --}}
        @if($vehicles->count() > 0)
            @foreach ($vehicles as $car)
                <div class="car-card reveal">
                    <div class="car-card-top">
                        <img src="{{ asset('images/' . $car->image) }}" 
                             alt="{{ $car->name }}" 
                             class="car-img" 
                             onerror="this.src='{{ asset('images/default-car.jpg') }}'">
                        
                        <div class="price-pill">${{ number_format($car->price) }}</div>

                        @if($car->is_sold)
                            <div class="sold-overlay">
                                <span class="sold-badge">{{ __('VENDU') }}</span>
                            </div>
                        @endif
                    </div>
                    
                    <div class="car-card-bottom ">
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
            <div class="no-results-box" style="grid-column: 1 / -1; text-align: center; padding: 60px 20px;">
                <div style="font-size: 4rem; color: #ccc; margin-bottom: 20px;">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <h2 style="font-size: 1.8rem; margin-bottom: 10px;">{{ __('No results found') }}</h2>
                <p style="color: #777; margin-bottom: 25px;">{{ __('No vehicles found matching your criteria. Try changing your filters.') }}</p>
                <a href="{{ route('catalogue') }}" 
                   style="background: #333; color: white; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: 600;">
                   {{ __('Clear all filters') }}
                </a>
            </div>
        @endif
    </div>

    {{-- PAGINATION --}}
    <div class="admin-pagination-container">
        {{ $vehicles->appends(request()->query())->links('pagination::bootstrap-4') }}
        <p class="pagination-info">
            {{ __('Showing') }} {{ $vehicles->firstItem() ?? 0 }} {{ __('to') }} {{ $vehicles->lastItem() ?? 0 }} {{ __('of') }} {{ $vehicles->total() }} {{ __('results') }}
        </p>
    </div>
</div>

<style>
    /* Card Top for Overlay */
    .car-card-top {
        position: relative;
        overflow: hidden;
    }

    /* Sold Badge Styling (Green from your screenshot) */
    .sold-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.2);
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

    .pagination-info {
        font-size: 0.9rem;
        color: #666;
        margin-top: 5px;
    }
</style>
@endsection