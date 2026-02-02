@extends('layouts.admin')

@section('title', 'Affiliate Dashboard')
@section('header_title', 'My Dashboard')

@section('content')
    {{-- Notice: We removed <div class="main-content"> and <div class="top-bar"> --}}
    {{-- The master layout handles those for us now --}}

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-coins"></i></div>
            <div class="stat-info">
                <h3>My Total Points</h3>
                <p>{{ Auth::user()->points ?? 0 }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-bullhorn"></i></div>
            <div class="stat-info">
                <h3>Success Referrals</h3>
                <p>{{ $totalLeads ?? 0 }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="color: #cd7f32;"><i class="fa-solid fa-medal"></i></div>
            <div class="stat-info">
                <h3>Current Rank</h3>
                <p style="font-size: 1.2em; color: var(--brand-red);">Bronze Member</p>
            </div>
        </div>
    </div>

    <div class="table-container" style="padding: 40px;">
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
            <div style="background: rgba(225, 6, 27, 0.1); padding: 10px; border-radius: 8px; color: var(--brand-red);">
                <i class="fa-solid fa-link fa-xl"></i>
            </div>
            <h2>Your Unique Referral Link</h2>
        </div>
        
        <p style="color: #666; margin-bottom: 25px;">Share this link with potential clients. When they submit an inquiry, you get credited automatically.</p>
        
        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <input type="text" id="refLink" readonly 
                   value="{{ url('/') . '?ref=' . Auth::user()->referral_code }}" 
                   style="flex: 1; min-width: 300px; padding: 15px; border: 2px solid #eee; border-radius: 8px; font-family: monospace; font-size: 1.1em; background: #fafafa;">
            
            <button onclick="copyToClipboard(this)" style="background: var(--brand-dark); color: white; border: none; padding: 0 30px; border-radius: 8px; font-weight: 600; cursor: pointer; transition: 0.3s;">
                Copy Link
            </button>
        </div>
    </div>

    <script>
        function copyToClipboard(btn) {
            const copyText = document.getElementById("refLink");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);
            
            const originalText = btn.innerHTML;
            btn.innerHTML = "Copied!";
            btn.style.background = "#28a745";
            
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.style.background = "#1a1a1a";
            }, 2000);
        }
    </script>
@endsection