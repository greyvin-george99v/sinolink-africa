<?php

use App\Http\Controllers\Admin\AffiliateManagementController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/catalogue', [VehicleController::class, 'catalogue'])->name('catalogue');

Route::get('/vehicles/{slug}', [VehicleController::class, 'show'])->name('vehicle.show');


Route::get('/affiliate-program', [VehicleController::class, 'showGenerator'])->name('affiliate-program');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/media', function () {
    return view('media');
})->name('media');

Route::get('/coverage', function () {
    return view('coverage');
})->name('coverage');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/privacy-policy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms-of-service', function () {
    return view('terms');
})->name('terms');


Route::post('/inquiry-store', [InquiryController::class, 'store'])->name('inquiry.store');
Route::get('/admin/inquiries', [InquiryController::class, 'index'])->name('admin.inquiries');

Route::middleware('auth.basic')->group(function () {
    Route::get('/admin/inquiries', [InquiryController::class, 'index'])->name('admin.inquiries');
    Route::get('/admin/inquiries/export', [InquiryController::class, 'exportCsv'])->name('admin.inquiries.export');
});

Route::get('/clear-site', function() {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    return "Cache is cleared! Delete this route now.";
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/affiliates', [AffiliateManagementController::class, 'index'])->name('admin.affiliates');
});

Route::get('/dashboard', [AffiliateController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
