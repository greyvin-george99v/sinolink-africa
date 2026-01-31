<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/catalogue', [VehicleController::class, 'catalogue'])->name('catalogue');

Route::get('/vehicles/{slug}', [VehicleController::class, 'show'])->name('vehicle.show');


Route::get('/agent-portal', [VehicleController::class, 'showGenerator'])->name('agent.generator');

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