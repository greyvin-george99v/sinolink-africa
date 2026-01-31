@extends('layouts.app')

@section('title', 'Catalogue')

@section('content')




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
<section class="filter-wrapper">
    <div class="container-center">
            <form action="{{ route('catalogue') }}" method="GET" class="filter-bar">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('Search...') }}" class="f-input-search">
            
            
            <select name="brand" class="f-select">
                <option value="">{{ __('All Brands') }}</option>
                <option value="Audi" {{ request('brand') == 'Audi' ? 'selected' : '' }}>Audi</option>
                <option value="BAIC HUANSU" {{ request('brand') == 'BAIC HUANSU' ? 'selected' : '' }}>BAIC HUANSU</option>
                <option value="Beijing Hyundai" {{ request('brand') == 'Beijing Hyundai' ? 'selected' : '' }}>Beijing Hyundai</option>
                <option value="Changan" {{ request('brand') == 'Changan' ? 'selected' : '' }}>Changan</option>
                <option value="Cheetah" {{ request('brand') == 'Cheetah' ? 'selected' : '' }}>Cheetah</option>
                <option value="Geely" {{ request('brand') == 'Geely' ? 'selected' : '' }}>Geely</option>
                <option value="Haval" {{ request('brand') == 'Haval' ? 'selected' : '' }}>Haval</option>
                <option value="Honda" {{ request('brand') == 'Honda' ? 'selected' : '' }}>Honda</option>
                <option value="Hyundai" {{ request('brand') == 'Hyundai' ? 'selected' : '' }}>Hyundai</option>
                <option value="Jeep" {{ request('brand') == 'Jeep' ? 'selected' : '' }}>Jeep</option>
                <option value="Jetour" {{ request('brand') == 'Jetour' ? 'selected' : '' }}>Jetour</option>
                <option value="Kia" {{ request('brand') == 'Kia' ? 'selected' : '' }}>Kia</option>
                <option value="Land Rover" {{ request('brand') == 'Land Rover' ? 'selected' : '' }}>Land Rover</option>
                <option value="Lexus" {{ request('brand') == 'Lexus' ? 'selected' : '' }}>Lexus</option>
                <option value="Mazda" {{ request('brand') == 'Mazda' ? 'selected' : '' }}>Mazda</option>
                <option value="Mercedes-Benz" {{ request('brand') == 'Mercedes-Benz' ? 'selected' : '' }}>Mercedes-Benz</option>
                <option value="Suzuki" {{ request('brand') == 'Suzuki' ? 'selected' : '' }}>Suzuki</option>
                <option value="Toyota" {{ request('brand') == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                <option value="Volkswagen" {{ request('brand') == 'Volkswagen' ? 'selected' : '' }}>Volkswagen</option>
                <option value="Zotye" {{ request('brand') == 'Zotye' ? 'selected' : '' }}>Zotye</option>
            </select>

            <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="{{ __('Min Price') }}" class="f-input">
            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="{{ __('Max Price') }}" class="f-input">

            <select name="sort"class="f-select">
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
        </div>
    </div>
</section>

<div class="catalogue-container">

  <div class="catalogue-grid ">
    @if($vehicles->count() > 0)
    @foreach ($vehicles as $id => $car)
        <div class="car-card">
            <div class="car-card-top">
                <img src="{{ asset('images/' . ($car['image'] ?? 'Sinolink-' . $id . '.jpg')) }}" alt="Car" class="car-img">
                <div class="price-pill">${{ number_format($car['price'] ?? 5000) }}</div>
            </div>
            
            <div class="car-card-bottom">
                <h3 class="car-name">{{ __($car['name'] ?? 'Toyota Highlander 2009') }}</h3>
                
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
                        {{ __($car['fuel'] ?? 'Gasoline') }}
                    </div>
                </div>

                <p class="car-desc">
    {{ \Illuminate\Support\Str::limit(__($car['desc'] ?? ''), 85) }}
</p>
                
                <a href="{{ url('/vehicles/' . ($car['slug'] ?? '')) }}" class="btn-details">{{ __('View Details') }}</a>
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

<div class="pagination-wrapper">
    {{ $vehicles->links() }}
</div>
</div>

</div>

@endsection