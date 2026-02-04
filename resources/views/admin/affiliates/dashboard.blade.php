@extends('layouts.admin')

@section('title', __('Affiliate Dashboard'))
@section('header_title', __('My Dashboard'))

@section('content')
<div class="main-content">
    {{-- TOP BAR --}}
    <div class="top-bar">
        <div>
            <h2 style="margin: 0;">@yield('header_title')</h2>
        </div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <button onclick="document.getElementById('leadModal').style.display='block'" 
                    style="background: var(--brand-red); color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: 600; cursor: pointer;">
                <i class="fa-solid fa-plus"></i> {{ __('Submit Customer') }}
            </button>
            
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

    {{-- SUCCESS MESSAGES --}}
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin: 20px 40px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    {{-- STATS GRID --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-coins"></i></div>
            <div class="stat-info">
                <h3>{{ __('My Total Points') }}</h3>
                <p>{{ $totalPoints }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="color: #28a745;"><i class="fa-solid fa-bullhorn"></i></div>
            <div class="stat-info">
                <h3>{{ __('Success Referrals') }}</h3>
                <p>{{ $totalLeads}}</p>
            </div>
        </div>
    </div>

 
    {{-- MANUAL SUBMISSIONS TABLE --}}
    <div class="table-container" style="padding: 40px; margin-bottom: 30px;">
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
            <div style="background: rgba(225, 6, 27, 0.1); padding: 10px; border-radius: 8px; color: var(--brand-red);">
                <i class="fa-solid fa-list-check fa-xl"></i>
            </div>
            <h2>{{ __('My Submitted Referrals') }}</h2>
        </div>

        <table>
            <thead>
                <tr>
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Customer') }}</th>
                    <th>{{ __('Contact Info') }}</th>
                    <th>{{ __('Country') }}</th>
                    <th>{{ __('Vehicle') }}</th>
                    <th>{{ __('Status') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($myLeads as $lead)
                    <tr>
                        {{-- Clean Date --}}
                        <td>{{ $lead->created_at->format('d M Y') }}</td>
                        
                        {{-- Customer Name --}}
                        <td style="font-weight: 600;">{{ $lead->customer_name }}</td>
                        
                        {{-- Contact Info (Number Only) --}}
                        <td>{{ $lead->customer_phone }}</td>
                        
                        {{-- Country --}}
                        <td>{{ $lead->country ?? 'N/A' }}</td>
                        
                        {{-- Vehicle --}}
                        <td><span class="status-badge">{{ $lead->vehicle_interest ?? 'N/A' }}</span></td>
                        
                        {{-- Status Badge --}}
                        <td>
                            <span class="status-badge" style="background: {{ $lead->status === 'sold' ? '#d4edda' : ($lead->status === 'rejected' ? '#f8d7da' : '#fff3cd') }}; color: {{ $lead->status === 'sold' ? '#155724' : ($lead->status === 'rejected' ? '#721c24' : '#856404') }};">
                                {{ strtoupper($lead->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: #888; padding: 20px;">{{ __('No manual submissions yet.') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- REFERRAL LINK SECTION --}}
    <div class="table-container" style="padding: 40px; margin-bottom: 30px;">
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
            <div style="background: rgba(225, 6, 27, 0.1); padding: 10px; border-radius: 8px; color: var(--brand-red);">
                <i class="fa-solid fa-link fa-xl"></i>
            </div>
            <h2>{{ __('Your Unique Referral Link') }}</h2>
        </div>
        
        <p style="color: #666; margin-bottom: 25px;">{{ __('Share this link with potential clients. When they submit an inquiry, you get credited automatically.') }}</p>
        
        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <input type="text" id="refLink" readonly 
                   value="{{ url('/') . '?ref=' . Auth::user()->referral_code }}" 
                   style="flex: 1; min-width: 300px; padding: 15px; border: 2px solid #eee; border-radius: 8px; font-family: monospace; font-size: 1.1em; background: #fafafa;">
            
            <button onclick="copyToClipboard(this)" style="background: var(--brand-dark); color: white; border: none; padding: 0 30px; border-radius: 8px; font-weight: 600; cursor: pointer; transition: 0.3s;">
                {{ __('Copy Link') }}
            </button>
        </div>
    </div>

{{-- SUBMIT LEAD MODAL --}}
<div id="leadModal" style="display:none; position:fixed; z-index:999; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.5);">
    <div style="background:white; margin:10% auto; padding:30px; border-radius:15px; width:400px; position:relative; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
        <span onclick="document.getElementById('leadModal').style.display='none'" style="position:absolute; right:20px; top:15px; cursor:pointer; font-size:24px; color: #888;">&times;</span>
        <h2 style="margin-bottom:20px; color: var(--brand-dark);">{{ __('Submit a Customer') }}</h2>
        
        <form action="{{ route('leads.store') }}" method="POST">
            @csrf
            <div style="margin-bottom:15px;">
                <label style="display: block; font-weight: 600; margin-bottom: 5px;">{{ __('Customer Name') }}</label>
                <input type="text" name="customer_name" required placeholder="Full Name" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label style="display: block; font-weight: 600; margin-bottom: 5px;">{{ __('Customer Phone') }}</label>
                <input type="text" name="customer_phone" required placeholder="+254..." style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label style="display: block; font-weight: 600; margin-bottom: 5px;">{{ __('Country') }}</label>
                <input type="text" name="country" placeholder="e.g. Kenya" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
            </div>
            
            <div style="margin-bottom:20px;">
                <label style="display: block; font-weight: 600; margin-bottom: 5px;">{{ __('Vehicle of Interest') }}</label>
                <input type="text" name="vehicle_interest" placeholder="e.g. Toyota Hilux" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
            </div>
            <button type="submit" style="width:100%; background:var(--brand-dark); color:white; border:none; padding:14px; border-radius:8px; font-weight: 600; cursor:pointer; font-size: 1rem;">
                {{ __('Submit Lead') }}
            </button>
        </form>
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
            btn.style.background = "var(--brand-dark)";
        }, 2000);
    }

    window.onclick = function(event) {
        let modal = document.getElementById('leadModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
@endsection