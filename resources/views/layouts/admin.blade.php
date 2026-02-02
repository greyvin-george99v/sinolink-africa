<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Sino Link Africa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="sideview">
        <div class="sideview-header">
           <a href="{{ route('dashboard') }}">
        <img src="{{ asset('images/sinolink-dashboard.png') }}" 
             alt="Sino Link Africa" 
             style="width: 180px; height: auto; display: block; margin: 0 auto;">
    </a>
        </div>
        <div class="nav-links">
    {{-- SHARED LINK --}}
    <a href="{{ url('/') }}" class="nav-item">
        <i class="fa-solid fa-globe"></i> Visit Website
    </a>

    @if(Auth::user()->is_admin) {{-- Assuming you have an is_admin column --}}
        {{-- ADMIN ONLY LINKS --}}
        <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-gauge"></i> Overview
        </a>
        <a href="{{ route('admin.affiliates') }}" class="nav-item {{ request()->routeIs('admin.affiliates') ? 'active' : '' }}">
            <i class="fa-solid fa-users-gear"></i> Affiliates
        </a>
        <a href="{{ route('admin.inquiries') }}" class="nav-item {{ request()->routeIs('admin.inquiries') ? 'active' : '' }}">
            <i class="fa-solid fa-envelope-open-text"></i> Inquiries
        </a>
    @else
        {{-- AFFILIATE ONLY LINKS --}}
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-house"></i> My Dashboard
        </a>
        <a href="#" class="nav-item">
            <i class="fa-solid fa-award"></i> Rewards
        </a>
    @endif

    {{-- SHARED ACCOUNT LINK --}}
    <a href="{{ route('profile.edit') }}" class="nav-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
        <i class="fa-solid fa-user-gear"></i> Account Settings
    </a>
</div>
        
        <form method="POST" action="{{ route('logout') }}" style="display: contents;">
            @csrf
            <button type="submit" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i> Sign Out</button>
        </form>
    </div>

    <div class="main-content">
        <div class="top-bar">
            <div>
                <h2 style="margin: 0;">@yield('header_title')</h2>
            </div>
            <a href="{{ route('profile.edit') }}" class="user-profile">
                <span>Profile Settings</span>
                <i class="fa-solid fa-circle-user"></i>
            </a>
        </div>

        @yield('content')
    </div>
</body>
</html>