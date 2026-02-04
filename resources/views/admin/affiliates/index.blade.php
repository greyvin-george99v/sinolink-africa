@extends('layouts.admin')


@section('content')

    <div class="main-content">
        <div class="top-bar">
            <h2>{{ __('Affiliate Management') }}</h2>
            <div class="user-profile">
                {{ __('Admin Panel') }} <i class="fa-solid fa-circle-user"></i>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
                <div class="stat-info">
                    <h3>{{ __('Total Affiliates') }}</h3>
                    <p>{{ $affiliates->count() }}</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-star"></i></div>
                <div class="stat-info">
                    <h3>{{ __('Active Points') }}</h3>
                    <p>{{ $affiliates->sum('points') }}</p>
                </div>
            </div>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h2>{{ __('Registered Partners') }}</h2>
            </div>
            <table>
                <thead>
                <tr>
                    <th>{{ __('Affiliate Name') }}</th>
                    <th>{{ __('Referral Code') }}</th>
                    <th>{{ __('Email Address') }}</th>
                    <th style="text-align: center;">{{ __('Points') }}</th>
                    <th style="text-align: center;">{{ __('Joined Date') }}</th>
                    <th style="text-align: center;">{{ __('Status') }}</th>
                    
            </thead>
            <tbody>
                @foreach($affiliates as $affiliate)
                <tr>
                    <td>
 
                        <strong>{{ $affiliate->name }}</strong>
                    </td>
                    <td><span class="code-badge">{{ $affiliate->referral_code }}</span></td>
                    <td>{{ $affiliate->email }}</td>
                    <td style="text-align: center;">{{ $affiliate->points ?? 0 }}</td>
                    <td style="text-align: center; color: #999;">{{ $affiliate->created_at->format('d M Y') }}</td>
                    
                    <td style="text-align: center;">
                        <form action="{{ route('admin.affiliates.toggle', $affiliate->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="status-badge {{ $affiliate->status === 'blocked' ? 'blocked-btn' : 'active-btn' }}">
                                {{ __($affiliate->status ?? 'active') }}
                            </button>
                        </form>
                    </td>

                    
                </tr>
                @endforeach
            </tbody>
            </table>

            @if($affiliates->isEmpty())
                <div style="text-align: center; padding: 50px; color: #bbb;">
                    <i class="fa-solid fa-folder-open" style="font-size: 3em; display: block; margin-bottom: 10px;"></i>
                    {{ __('No affiliates found.') }}
                </div>
            @endif
        </div>
    </div>

@endsection