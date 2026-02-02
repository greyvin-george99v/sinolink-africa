@extends('layouts.admin')

@section('title', 'Account Settings')
@section('header_title', 'Update Profile')

@section('content')
<div class="profile-container">
    <div class="profile-grid">
        <div class="table-container profile-card">
            <div class="card-header">
                <i class="fa-solid fa-id-card"></i>
                <h3>Profile Information</h3>
            </div>
            <div class="form-wrapper">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="table-container profile-card">
            <div class="card-header">
                <i class="fa-solid fa-shield-halved"></i>
                <h3>Security Settings</h3>
            </div>
            <div class="form-wrapper">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>

    <div class="table-container profile-card danger-zone">
        <div class="card-header">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <h3>Danger Zone</h3>
        </div>
        <div class="form-wrapper">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection