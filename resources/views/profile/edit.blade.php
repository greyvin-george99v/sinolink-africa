@extends('layouts.admin')

@section('title', __('Account Settings'))
@section('header_title', __('Update Profile'))

@section('content')

<div class="main-content">
        <div class="top-bar">
            <div>
                <h2 style="margin: 0;">@yield('header_title')</h2>
            </div>
            <a href="{{ route('profile.edit') }}" class="user-profile">
                
                {{ Auth::user()->name }}<i class="fa-solid fa-circle-user"></i>
            </a>
        </div>
<div class="profile-container">
    <div class="profile-grid">
        <div class="table-container profile-card">
            <div class="card-header">
                <i class="fa-solid fa-id-card"></i>
                <h3>{{ __('Profile Information') }}</h3>
            </div>
            <div class="form-wrapper">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="table-container profile-card">
            <div class="card-header">
                <i class="fa-solid fa-shield-halved"></i>
                <h3>{{ __('Security Settings') }}</h3>
            </div>
            <div class="form-wrapper">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>

    <div class="table-container profile-card danger-zone">
        <div class="card-header">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <h3>{{ __('Danger Zone') }}</h3>
        </div>
        <div class="form-wrapper">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection