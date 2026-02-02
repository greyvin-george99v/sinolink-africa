<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Sino Link Africa</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    
    
</head>
<body>

    <div class="sideview">
        <div class="sideview-header">
            <h2 style="color: var(--brand-red); font-weight: 800;">SINO<span style="color: white;">LINK</span></h2>
        </div>
        <div class="nav-links">
            <a href="#" class="nav-item">
                <i class="fa-solid fa-gauge"></i> Overview
            </a>
            <a href="{{ route('admin.affiliates') }}" class="nav-item active">
                <i class="fa-solid fa-users-gear"></i> Affiliates
            </a>
            <a href="{{ route('admin.inquiries') }}" class="nav-item">
                <i class="fa-solid fa-envelope-open-text"></i> Inquiries
            </a>
            <a href="#" class="nav-item">
                <i class="fa-solid fa-car"></i> Vehicles
            </a>
        </div>
        
        <form method="POST" action="{{ route('logout') }}" style="display: contents;">
            @csrf
            <button type="submit" class="logout-btn" style="border: none; cursor: pointer; width: calc(100% - 40px);">
                <i class="fa-solid fa-right-from-bracket"></i> Sign Out
            </button>
        </form>
    </div>

    <div class="main-content">
        <div class="top-bar">
            <h2>Affiliate Management</h2>
            <div class="user-profile">
                Admin Panel <i class="fa-solid fa-circle-user"></i>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
                <div class="stat-info">
                    <h3>Total Affiliates</h3>
                    <p>{{ $affiliates->count() }}</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-star"></i></div>
                <div class="stat-info">
                    <h3>Active Points</h3>
                    <p>{{ $affiliates->sum('points') }}</p>
                </div>
            </div>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h2>Registered Partners</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Affiliate Name</th>
                        <th>Referral Code</th>
                        <th>Email Address</th>
                        <th style="text-align: center;">Points</th>
                        <th style="text-align: right;">Joined Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($affiliates as $affiliate)
                    <tr>
                        <td style="font-weight: 600;">{{ $affiliate->name }}</td>
                        <td><span class="code-badge">{{ $affiliate->referral_code }}</span></td>
                        <td>{{ $affiliate->email }}</td>
                        <td style="text-align: center;" class="points-badge">
                            {{ $affiliate->points ?? 0 }}
                        </td>
                        <td style="text-align: right; color: #999;">
                            {{ $affiliate->created_at->format('d M Y') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if($affiliates->isEmpty())
                <div style="text-align: center; padding: 50px; color: #bbb;">
                    <i class="fa-solid fa-folder-open" style="font-size: 3em; display: block; margin-bottom: 10px;"></i>
                    No affiliates found.
                </div>
            @endif
        </div>
    </div>

</body>
</html>