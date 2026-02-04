<?php

use App\Http\Controllers\Admin\AffiliateManagementController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\LeadController;
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

Route::middleware(['auth'])->group(function () {
    // We name it 'leads.store' so it doesn't conflict with 'admin.' prefix
    Route::post('/leads/submit', [LeadController::class, 'store'])->name('leads.store');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // This defines the missing route
    Route::get('/dashboard', [AffiliateManagementController::class, 'index'])->name('dashboard');
    
    // Existing routes moved into the group for consistency
    Route::get('/affiliates', [AffiliateManagementController::class, 'index'])->name('affiliates');
    Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries');
    Route::get('/inquiries/export', [InquiryController::class, 'exportCsv'])->name('inquiries.export');
    Route::get('/leads', [LeadController::class, 'index'])->name('leads');
    Route::post('/leads/{id}/sold', [LeadController::class, 'markAsSold'])->name('leads.sold');
    
});

Route::get('/dashboard', [AffiliateController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/admin/affiliates/{id}/toggle-status', [AdminController::class, 'toggleStatus'])->name('admin.affiliates.toggle');

// Temporary deployment helper
Route::get('/deploy-helper', function () {
    // Runs migrations to add that 'role' column on the server
    Artisan::call('migrate --force'); 
    // Link storage for images
    Artisan::call('storage:link');
    return "Migration and Storage Link complete!";
});

require __DIR__.'/auth.php';
