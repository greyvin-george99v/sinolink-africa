@extends('layouts.admin')

@section('title', 'Inquiry Management')
@section('header_title', 'Inquiry Management')

@section('content')
    {{-- We removed sideview and main-content because the Layout file already has them --}}
    <div class="main-content">
        <div class="top-bar">
            <h2>{{ __('Inquiries Management') }}</h2>
            <div class="user-profile">
                {{ __('Admin Panel') }} <i class="fa-solid fa-circle-user"></i>
            </div>
        </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Customer Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Interested In') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inquiries as $inquiry)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($inquiry->created_at)->format('d M Y') }}</td>
                    <td style="font-weight: 600;">{{ $inquiry->name }}</td>
                    <td>{{ $inquiry->email }}</td>
                    <td><span class="status-badge">{{ $inquiry->vehicle_type }}</span></td>
                </tr>
                @endforeach
                
                @if($inquiries->isEmpty())
                <tr>
                    <td colspan="4" style="text-align: center; padding: 40px; color: #888;">
                        {{ __('No inquiries found yet.') }}
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection