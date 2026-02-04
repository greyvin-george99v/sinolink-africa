@extends('layouts.admin')

@section('title', 'Referral Leads')

@section('content')
<div class="main-content">
    <div class="top-bar">
        <h2>{{ __('Referral Leads') }}</h2>
        <div class="user-profile">
            {{ __('Admin Panel') }} <i class="fa-solid fa-circle-user"></i>
        </div>
    </div>

    <p style="margin: 20px 0 0 40px; color: #666;">{{ __('Review and validate affiliate customer submissions.') }}</p>

    <div class="table-container" style="margin-top: 20px;">
        <table>
            <thead>
                <tr>
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Affiliate') }}</th>
                    <th>{{ __('Customer Name') }}</th>
                    <th>{{ __('Contact') }}</th>
                    <th>{{ __('Vehicle') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leads as $lead)
                <tr>
                    <td>{{ $lead->created_at->format('d M Y') }}</td>
                    <td style="font-weight: 600;">{{ $lead->user->name ?? 'N/A' }}</td>
                    <td>{{ $lead->customer_name }}</td>
                    <td>{{ $lead->customer_phone }}</td>
                    <td>{{ $lead->vehicle_interest ?? 'N/A' }}</td>
                    
                    <td>
                        <span class="status-badge {{ $lead->status === 'sold' ? 'active' : '' }}" 
                              style="background: {{ $lead->status === 'sold' ? '#d4edda' : '#fff3cd' }}; 
                                     color: {{ $lead->status === 'sold' ? '#155724' : '#856404' }};">
                            {{ ucfirst($lead->status) }}
                        </span>
                    </td>
                    <td>
                        @if($lead->status === 'pending')
                            <form action="{{ route('admin.leads.sold', $lead->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-approve" style="background: #e31e24; color: white; border: none; padding: 5px 15px; border-radius: 5px; cursor: pointer;">
                                    
                                    {{ __('Confirm Sale') }}
                                </button>
                            </form>
                        @else
                            <span style="color: #28a745;"><i class="fa-solid fa-check-double"></i> {{ __('Awarded') }}</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 40px; color: #999;">{{ __('No referral leads found.') }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection