<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReviewController;

// ROUTE VIEW PAGES
Route::get('/', [LandingController::class, 'index'])->name('landing.index');

Route::get('/login', function () {
    return view('login');
});
// ->middleware('guest');
Route::post('/login', [UserController::class, 'login']);
// ->middleware('guest');


//FORGOT PASSWORD
Route::get('/forgot-password', [ForgotPasswordController::class, 'showEmailForm']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOtp']);

Route::get('/verify-otp', [ForgotPasswordController::class, 'showOtpForm']);
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOtp']);

Route::post('/resend-otp', [ForgotPasswordController::class, 'resendOtp']);

Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm']);
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);

Route::get('/success', [ForgotPasswordController::class, 'showSuccess']);

//REGISTER
Route::get('/register-step1', function () {
    return view('register');
});
// ->middleware('guest');

Route::post('/register-step1', [UserController::class, 'registerStep1']);
// ->middleware('guest');

Route::get('/register-nextStep', function () {
    return view('registerNext');
});
// ->middleware('guest');

Route::post('/register-nextStep', [UserController::class, 'store']);
// ->middleware('guest');

Route::get('/home', [UserController::class, 'home']);


// VIEW PAGES
Route::get('/syarat', function () {
    return view('syarat');
});

Route::get('/places/{id}', [UserController::class, 'showPlace'])->name('places.show');


//rekomendasi
Route::get('/rekomendasi', [UserController::class, 'rekomendasi'])->name('rekomendasi');
Route::get('/places/kategori/{id}', [UserController::class, 'placesByKategori'])->name('places.kategori');

// ROUTE CRUD USER
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::post('/users/{id}', [UserController::class, 'update']);
Route::post('/users/{id}/delete', [UserController::class, 'destroy']);

// CHATBOT
Route::get('/chatbot', [ChatbotController::class, 'index']);
Route::get('/chatbot/step/{key}', [ChatbotController::class, 'getStep']);

// ADMIN
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/lokasi', [AdminController::class, 'lokasi'])->name('lokasi');
Route::get('/tambah-lokasi', [AdminController::class, 'tambahLokasi'])->name('tambahLokasi');
Route::get('/ulasan', [AdminController::class, 'ulasan'])->name('ulasan');
Route::post('/tambah-lokasi', [AdminController::class, 'simpanFasilitastempat'])->name('simpanTempat');

Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('pengguna');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::post('/wishlist/toggle', [WishlistController::class, 'toggle']);
});

// Route::middleware('auth')->group(function () {

    Route::get('/places/kategori/{id}', [UserController::class, 'placesByKategori'])->name('places.kategori');
    Route::get('/places/{id}/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('/places/{id}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    // GENERAL - taruh paling bawah
    Route::get('/places/{id}', [UserController::class, 'showPlace'])->name('places.show');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    
// });