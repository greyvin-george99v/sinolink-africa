<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | SinoLink Africa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="sideview">
    <div class="sideview-header">
        <a href="{{ Auth::check() ? (Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard')) : url('/') }}">
            <img src="{{ asset('images/sinolink-dashboard.png') }}" 
                 alt="Sino Link Africa" 
                 style="width: 180px; height: auto; display: block; margin: 0 auto;">
        </a>
    </div>
    
    <div class="nav-links">
        {{-- PUBLIC LINK --}}
        <a href="{{ url('/') }}" class="nav-item">
            <i class="fa-solid fa-globe"></i> {{ __('Visit Website') }}
        </a>

        @auth
            @if(Auth::user()?->role === 'admin') 
                {{-- 1. Dashboard --}}
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i> {{ __('Admin Dashboard') }}
                </a>

                {{-- 2. Referral Leads (With Badge) --}}
                <a href="{{ route('admin.leads') }}" class="nav-item {{ request()->routeIs('admin.leads') ? 'active' : '' }}">
                    <i class="fa-solid fa-hand-holding-dollar"></i> {{ __('Referral Leads') }}
                    @php
                        $pendingLeads = \App\Models\Lead::where('status', 'pending')->count();
                    @endphp
                    @if($pendingLeads > 0)
                        <span class="badge" style="background: #e31e24; color: white; padding: 2px 6px; border-radius: 50%; font-size: 10px; margin-left: 5px;">
                            {{ $pendingLeads }}
                        </span>
                    @endif
                </a>

                {{-- 3. Inquiries --}}
                <a href="{{ route('admin.inquiries') }}" class="nav-item {{ request()->routeIs('admin.inquiries') ? 'active' : '' }}">
                    <i class="fa-solid fa-envelope-open-text"></i> {{ __('Inquiries') }}
                </a>

                {{-- 4. Manage Catalogue (Points Logic Managed Here) --}}
                <a href="{{ route('admin.vehicles.index') }}" class="nav-item {{ request()->routeIs('admin.vehicles.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-car-side"></i> {{ __('Manage Catalogue') }}
                </a>

                {{-- 5. Affiliates --}}
                <a href="{{ route('admin.affiliates') }}" class="nav-item {{ request()->routeIs('admin.affiliates') ? 'active' : '' }}">
                    <i class="fa-solid fa-users-gear"></i> {{ __('Affiliates') }}
                </a>

            @else
                {{-- AFFILIATE SPECIFIC LINKS --}}
                <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i> {{ __('My Dashboard') }}
                </a>
            @endif

            {{-- COMMON LINKS --}}
            <a href="{{ route('profile.edit') }}" class="nav-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                <i class="fa-solid fa-user-gear"></i> {{ __('Account Settings') }}
            </a>
        @else
            <a href="{{ route('login') }}" class="nav-item">
                <i class="fa-solid fa-right-to-bracket"></i> {{ __('Sign In') }}
            </a>
        @endauth
    </div>
    
    @auth
        <div class="sideview-footer" style="margin-top: auto;">
            <form method="POST" action="{{ route('logout') }}" style="display: contents;">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fa-solid fa-right-from-bracket"></i> {{ __('Sign Out') }}
                </button>
            </form>
        </div>
    @endauth
</div>

    
        @yield('content')
    
</body>
</html>