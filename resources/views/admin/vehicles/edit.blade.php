@extends('layouts.admin')

@section('title', __('Edit Vehicle'))
@section('header_title', __('Catalogue Management'))

@section('content')
<div class="main-content">
    {{-- TOP BAR --}}
    <div class="top-bar">
        <div>
            <h2 style="margin: 0;">{{ __('Edit Vehicle') }}: {{ $vehicle->name }}</h2>
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

    <div class="table-container" style="padding: 40px; margin-bottom: 30px;">
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 30px;">
            <div style="background: rgba(225, 6, 27, 0.1); padding: 10px; border-radius: 8px; color: var(--brand-red);">
                <i class="fa-solid fa-pen-to-square fa-xl"></i>
            </div>
            <h2>{{ __('Update Vehicle Details') }}</h2>
        </div>

        <form action="{{ route('admin.vehicles.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; margin-bottom: 25px;">
                
                {{-- SALE STATUS (POINTS REMOVED) --}}
                <div style="grid-column: 1 / -1; background: #fdfdfd; padding: 20px; border: 1px solid #eee; border-radius: 8px; margin-bottom: 10px;">
                    <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--brand-red);">{{ __('Inventory Status') }}</label>
                    <select name="is_sold" style="width:100%; padding:12px; border:2px solid {{ $vehicle->is_sold ? '#e31e24' : '#28a745' }}; border-radius:8px; font-weight: 600;">
                        <option value="0" {{ !$vehicle->is_sold ? 'selected' : '' }}>{{ __('AVAILABLE') }}</option>
                        <option value="1" {{ $vehicle->is_sold ? 'selected' : '' }}>{{ __('SOLD') }}</option>
                    </select>
                </div>

                {{-- Name --}}
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Vehicle Name') }}</label>
                    <input type="text" name="name" value="{{ old('name', $vehicle->name) }}" required style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                </div>

                {{-- Price --}}
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Price ($)') }}</label>
                    <input type="number" name="price" value="{{ old('price', $vehicle->price) }}" required style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                </div>

                {{-- Year --}}
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Year') }}</label>
                    <input type="text" name="year" value="{{ old('year', $vehicle->year) }}" required style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                </div>

                {{-- KILOMETRE --}}
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Kilométrage') }}</label>
                    <input type="text" name="km" value="{{ old('km', $vehicle->km) }}" required style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                </div>

                {{-- COLOR --}}
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Couleur') }}</label>
                    <input type="text" name="color" value="{{ old('color', $vehicle->color) }}" required style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                </div>

                {{-- Fuel Type --}}
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Carburant') }}</label>
                    <select name="fuel" required style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                        <option value="Gasoline" {{ $vehicle->fuel == 'Gasoline' ? 'selected' : '' }}>Gasoline</option>
                        <option value="Diesel" {{ $vehicle->fuel == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                        <option value="Electric" {{ $vehicle->fuel == 'Electric' ? 'selected' : '' }}>Electric</option>
                        <option value="Hybrid" {{ $vehicle->fuel == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                    </select>
                </div>

                {{-- Transmission --}}
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Transmission') }}</label>
                    <select name="trans" required style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                        <option value="Automatic" {{ $vehicle->trans == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                        <option value="Manual" {{ $vehicle->trans == 'Manual' ? 'selected' : '' }}>Manual</option>
                    </select>
                </div>
            </div>

            {{-- Description --}}
            <div style="margin-bottom: 25px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Description') }}</label>
                <textarea name="desc" rows="4" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">{{ old('desc', $vehicle->desc) }}</textarea>
            </div>

            {{-- Image Upload Section --}}
            <div style="margin-bottom: 30px; display: flex; gap: 20px; align-items: center;">
                <div style="flex: 1;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">{{ __('Update Vehicle Image') }}</label>
                    <input type="file" name="image" style="width:100%; padding:10px; border:2px dashed #eee; border-radius:8px; background: #fafafa;">
                    <p style="font-size: 0.85em; color: #888; margin-top: 5px;">{{ __('Leave blank to keep current image.') }}</p>
                </div>
                
                @if($vehicle->image)
                    <div style="text-align: center;">
                        <p style="font-size: 0.75rem; margin-bottom: 5px; font-weight: 600;">{{ __('Current Photo') }}</p>
                        <img src="{{ asset('images/' . $vehicle->image) }}" 
                             alt="{{ $vehicle->name }}" 
                             style="height: 80px; width: 120px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd;">
                    </div>
                @else
                    <div style="text-align: center; height: 80px; width: 120px; background: #eee; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-image-slash" style="color: #ccc;"></i>
                    </div>
                @endif
            </div>

            {{-- SUBMIT BUTTON --}}
            <div style="border-top: 1px solid #eee; padding-top: 25px; display: flex; justify-content: flex-end;">
                <button type="submit" style="background: var(--brand-red); color: white; border: none; padding: 15px 40px; border-radius: 8px; font-weight: 600; cursor: pointer; font-size: 1rem;">
                    {{ __('Update Vehicle') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection