@extends('layouts.admin')

@section('title', __('Add New Vehicle'))
@section('header_title', __('Catalogue Management'))

@section('content')
<div class="main-content">
    {{-- TOP BAR --}}
    <div class="top-bar">
        <div>
            <h2 style="margin: 0;">{{ __('Add New Vehicle') }}</h2>
        </div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <a href="{{ route('admin.vehicles.index') }}" 
               style="background: var(--brand-dark); color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: 600; cursor: pointer; text-decoration: none;">
                <i class="fa-solid fa-arrow-left"></i> {{ __('Back to List') }}
            </a>
            
            <a href="{{ route('profile.edit') }}" class="user-profile">
                {{ Auth::user()->name }} <i class="fa-solid fa-circle-user"></i>
            </a>
        </div>
    </div>

    {{-- VALIDATION ERROR MESSAGES --}}
    @if ($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin: 20px 40px; border: 1px solid #f5c6cb;">
            <strong style="display: block; margin-bottom: 5px;">{{ __('Please fix the following errors:') }}</strong>
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM CONTAINER --}}
    <div class="table-container" style="padding: 40px; margin-bottom: 30px;">
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 30px;">
            <div style="background: rgba(225, 6, 27, 0.1); padding: 10px; border-radius: 8px; color: var(--brand-red);">
                <i class="fa-solid fa-plus-circle fa-xl"></i>
            </div>
            <h2>{{ __('Vehicle Details') }}</h2>
        </div>

        <form action="{{ route('admin.vehicles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; margin-bottom: 25px;">
                {{-- Vehicle Name --}}
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Vehicle Name') }}</label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Lexus RX Classic 350" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                </div>

                {{-- Price --}}
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Price ($)') }}</label>
                    <input type="number" name="price" value="{{ old('price') }}" required placeholder="4890" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                </div>

                {{-- Year --}}
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Year') }}</label>
                    <input type="text" name="year" value="{{ old('year') }}" required placeholder="2007" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                </div>

                {{-- Mileage --}}
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Mileage') }}</label>
                    <input type="text" name="km" value="{{ old('km') }}" required placeholder="e.g. 130,000 km" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                </div>

                {{-- Color (FIXED: ADDED MISSING FIELD) --}}
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Color') }}</label>
                    <input type="text" name="color" value="{{ old('color') }}" required placeholder="e.g. Silver Metallic" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                </div>

                {{-- Fuel Type --}}
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Fuel') }}</label>
                    <select name="fuel" required style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                        <option value="Gasoline" {{ old('fuel') == 'Gasoline' ? 'selected' : '' }}>Gasoline</option>
                        <option value="Diesel" {{ old('fuel') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                        <option value="Electric" {{ old('fuel') == 'Electric' ? 'selected' : '' }}>Electric</option>
                        <option value="Hybrid" {{ old('fuel') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                    </select>
                </div>

                {{-- Transmission --}}
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Transmission') }}</label>
                    <select name="trans" required style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                        <option value="Automatic" {{ old('trans') == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                        <option value="Manual" {{ old('trans') == 'Manual' ? 'selected' : '' }}>Manual</option>
                    </select>
                </div>
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Description') }}</label>
                <textarea name="desc" rows="4" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">{{ old('desc') }}</textarea>
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Vehicle Image') }}</label>
                <input type="file" name="image" required style="width:100%; padding:10px; border:2px dashed #eee; border-radius:8px; background: #fafafa;">
                <p style="font-size: 0.85em; color: #888; margin-top: 5px;">{{ __('Max size: 2MB. Format: JPG, PNG, JPEG.') }}</p>
            </div>

            <div style="border-top: 1px solid #eee; padding-top: 25px; display: flex; justify-content: flex-end;">
                <button type="submit" style="background: var(--brand-red); color: white; border: none; padding: 15px 40px; border-radius: 8px; font-weight: 600; cursor: pointer; font-size: 1rem;">
                    {{ __('Save Vehicle to Catalogue') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection