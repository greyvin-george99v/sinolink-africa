<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/catalogue', function () {
    return view('catalogue');
})->name('catalogue');



Route::get('/details', function () {
    return view('vehicle-details');
});

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