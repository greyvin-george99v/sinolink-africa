@extends('layouts.admin')

@section('title', __('Manage Catalogue'))
@section('header_title', __('Vehicle Catalogue'))

@section('content')
<div class="main-content">
    {{-- TOP BAR --}}
    <div class="top-bar">
        <div>
            <h2 style="margin: 0;">@yield('header_title')</h2>
        </div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <a href="{{ route('admin.vehicles.create') }}" 
               style="background: var(--brand-red); color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: 600; cursor: pointer; text-decoration: none;">
                <i class="fa-solid fa-plus"></i> {{ __('Add New Vehicle') }}
            </a>
            
            <a href="{{ route('profile.edit') }}" class="user-profile">
                {{ Auth::user()->name }} <i class="fa-solid fa-circle-user"></i>
            </a>
        </div>
    </div>

    {{-- SUCCESS MESSAGES --}}
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin: 20px 40px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    {{-- VEHICLE TABLE --}}
    <div class="table-container" style="padding: 40px; margin-bottom: 30px;">
        
        {{-- SEARCH & HEADER SECTION --}}
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
            <div style="display: flex; align-items: center; gap: 15px;">
                <div style="background: rgba(225, 6, 27, 0.1); padding: 10px; border-radius: 8px; color: var(--brand-red);">
                    <i class="fa-solid fa-car-side fa-xl"></i>
                </div>
                <h2 style="margin: 0;">{{ __('Current Inventory') }}</h2>
            </div>

            {{-- SEARCH FORM --}}
            <form action="{{ route('admin.vehicles.index') }}" method="GET" style="display: flex; gap: 10px;">
                    <input type="text" name="search" value="{{ request('search') }}" 
                        placeholder="Search car name..." 
                        style="padding: 10px; border: 1px solid #ddd; border-radius: 8px; width: 250px;">
                    
                    <button type="submit" style="background: #333; color: #fff; padding: 10px 20px; border-radius: 8px; border: none; cursor: pointer;">
                        Search
                    </button>

                    @if(request('search'))
                        <a href="{{ route('admin.vehicles.index') }}" style="padding: 10px; color: red; text-decoration: none;">Clear</a>
                    @endif
                </form>
        </div>

        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="border-bottom: 2px solid #eee;">
                    <th style="text-align: left; padding: 12px; width: 50px;">#</th>
                    <th style="text-align: left; padding: 12px;">{{ __('Preview') }}</th>
                    <th style="text-align: left; padding: 12px;">{{ __('Vehicle Name') }}</th>
                    <th style="text-align: left; padding: 12px;">{{ __('Price') }}</th>
                    <th style="text-align: left; padding: 12px;">{{ __('Year') }}</th>
                    <th style="text-align: left; padding: 12px;">{{ __('Color') }}</th>
                    <th style="text-align: left; padding: 12px;">{{ __('Status') }}</th>
                    <th style="text-align: center; padding: 12px;">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vehicles as $vehicle)
                    <tr style="border-bottom: 1px solid #eee;">
                        {{-- DYNAMIC NUMBERING --}}
                        <td style="padding: 12px; font-weight: 600; color: #888;">
                            {{ ($vehicles->currentPage() - 1) * $vehicles->perPage() + $loop->iteration }}
                        </td>

                        <td style="padding: 15px 12px;">
                            @if($vehicle->image)
                                <img src="{{ asset('images/' . $vehicle->image) }}" 
                                     alt="{{ $vehicle->name }}" 
                                     style="width: 80px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid #eee;">
                            @else
                                <div style="width: 80px; height: 50px; background: #f0f0f0; border-radius: 6px; display: flex; align-items: center; justify-content: center; border: 1px solid #eee;">
                                    <i class="fa-solid fa-car" style="color: #ccc; font-size: 1.2rem;"></i>
                                </div>
                            @endif
                        </td>

                        <td style="font-weight: 600; padding: 12px;">{{ $vehicle->name }}</td>
                        <td style="color: var(--brand-red); font-weight: 700; padding: 12px;">${{ number_format($vehicle->price) }}</td>
                        <td style="padding: 12px;">{{ $vehicle->year }}</td>
                        
                        <td style="padding: 12px;">
                            <span style="background: #f8f9fa; padding: 4px 10px; border-radius: 4px; border: 1px solid #eee; font-size: 0.85rem;">
                                {{ $vehicle->color ?? 'N/A' }}
                            </span>
                        </td>
                        
                        <td style="padding: 12px;">
                            @if($vehicle->is_sold)
                                <span class="status-badge" style="padding: 5px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 600; background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;">
                                    {{ __('SOLD') }}
                                </span>
                            @else
                                <span class="status-badge" style="padding: 5px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 600; background: #d4edda; color: #155724; border: 1px solid #c3e6cb;">
                                    {{ __('AVAILABLE') }}
                                </span>
                            @endif
                        </td>
                        
                        <td style="padding: 12px;">
                            <div style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                                <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" 
                                   style="display: flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #f4f4f4; color: #333; border-radius: 6px; text-decoration: none; transition: 0.3s;" 
                                   title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                @if(!$vehicle->is_sold)
                                    <form action="{{ route('admin.vehicles.markSold', $vehicle->id) }}" method="POST" style="margin: 0;">
                                        @csrf
                                        <button type="submit" 
                                                style="display: flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: rgba(40, 167, 69, 0.1); border: none; color: #28a745; border-radius: 6px; cursor: pointer; transition: 0.3s;" 
                                                title="Mark as Sold">
                                            <i class="fa-solid fa-check-double"></i>
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('admin.vehicles.destroy', $vehicle->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Delete this vehicle?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            style="display: flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: rgba(227, 30, 36, 0.1); border: none; color: #e31e24; border-radius: 6px; cursor: pointer; transition: 0.3s;" 
                                            title="Delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align: center; color: #888; padding: 40px;">
                            {{ __('No vehicles found.') }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- PAGINATION --}}
        <div class="admin-pagination-container">
            {{ $vehicles->links('pagination::bootstrap-4') }}
            <p class="pagination-info">
                Showing {{ $vehicles->firstItem() ?? 0 }} to {{ $vehicles->lastItem() ?? 0 }} of {{ $vehicles->total() }} results
            </p>
        </div>
    </div>
</div>

<style>
    .table-container a:hover, .table-container button:hover {
        transform: translateY(-2px);
        filter: brightness(0.9);
    }

    .admin-pagination-container {
        margin-top: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    /* Bootstrap 4 Overrides for consistent styling */
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
    }
</style>
@endsection