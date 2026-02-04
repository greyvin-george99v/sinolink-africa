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
            {{-- Use url('/dashboard') instead of route if the user might be a guest --}}
            <a href="{{ Auth::check() ? route('dashboard') : url('/') }}">
                <img src="{{ asset('images/sinolink-dashboard.png') }}" 
                     alt="Sino Link Africa" 
                     style="width: 180px; height: auto; display: block; margin: 0 auto;">
            </a>
        </div>
        
        <div class="nav-links">
            <a href="{{ url('/') }}" class="nav-item">
                <i class="fa-solid fa-globe"></i> {{ __('Visit Website') }}
            </a>

            {{-- 1. Check if user is logged in first --}}
            @auth
                {{-- 2. Use ?-> (Null Safe Operator) just in case --}}
                @if(Auth::user()?->role === 'admin') 
                    
                    <a href="{{ route('admin.affiliates') }}" class="nav-item {{ request()->routeIs('admin.affiliates') ? 'active' : '' }}">
                        <i class="fa-solid fa-users-gear"></i> {{ __('Affiliates') }}
                    </a>

                    <a href="{{ route('admin.leads') }}" class="nav-item {{ request()->routeIs('admin.leads') ? 'active' : '' }}">
                        <i class="fa-solid fa-hand-holding-dollar"></i> {{ __('Referral Leads') }}
                        @php
                            // Use try-catch or check if table exists to prevent migration errors
                            $pendingLeads = \App\Models\Lead::where('status', 'pending')->count();
                        @endphp
                        @if($pendingLeads > 0)
                            <span class="badge" style="background: #e31e24; color: white; padding: 2px 6px; border-radius: 50%; font-size: 10px; margin-left: 5px;">
                                {{ $pendingLeads }}
                            </span>
                        @endif
                    </a>

                    <a href="{{ route('admin.inquiries') }}" class="nav-item {{ request()->routeIs('admin.inquiries') ? 'active' : '' }}">
                        <i class="fa-solid fa-envelope-open-text"></i> {{ __('Inquiries') }}
                    </a>
                @else
                    {{-- This shows for Affiliates --}}
                    <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-house"></i> {{ __('My Dashboard') }}
                    </a>
                @endif

                <a href="{{ route('profile.edit') }}" class="nav-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    <i class="fa-solid fa-user-gear"></i> {{ __('Account Settings') }}
                </a>
            @else
                {{-- 3. Show this if they are NOT logged in (Guests clicking "Become Affiliate") --}}
                <a href="{{ route('login') }}" class="nav-item">
                    <i class="fa-solid fa-right-to-bracket"></i> {{ __('Sign In') }}
                </a>
            @endauth
        </div>
        
        @auth
            <form method="POST" action="{{ route('logout') }}" style="display: contents;">
                @csrf
                <button type="submit" class="logout-btn"><i class="fa-solid text-black fa-right-from-bracket"></i> {{ __('Sign Out') }}</button>
            </form>
        @endauth
    </div>

    
        @yield('content')
    
</body>
</html>