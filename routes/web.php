<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReviewController;

// ============================================================
// PUBLIC — Bisa diakses siapa saja (guest & user)
// ============================================================
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/home', [UserController::class, 'home'])->name('home');
Route::get('/rekomendasi', [UserController::class, 'rekomendasi'])->name('rekomendasi');
Route::get('/places/{id}', [UserController::class, 'showPlace'])->name('places.show');
Route::get('/places/kategori/{id}', [UserController::class, 'placesByKategori'])->name('places.kategori');
Route::get('/places/{id}/reviews', [ReviewController::class, 'index'])->name('reviews.index');

// ROUTE CRUD USER
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::post('/users/{id}', [UserController::class, 'update']);
Route::post('/users/{id}/delete', [UserController::class, 'destroy']);

// CHATBOT
Route::get('/chatbot', [ChatbotController::class, 'index']);
Route::get('/syarat', fn() => view('syarat'));

// ============================================================
// GUEST ONLY — Redirect ke home kalau sudah login
// ============================================================
Route::middleware('guest')->group(function () {
    Route::get('/login', fn() => view('login'))->name('login');
    Route::post('/login', [UserController::class, 'login']);

    Route::get('/register-step1', fn() => view('register'))->name('register');
    Route::post('/register-step1', [UserController::class, 'registerStep1']);
    Route::get('/register-nextStep', fn() => view('registerNext'));
    Route::post('/register-nextStep', [UserController::class, 'store']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showEmailForm']);
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOtp']);
    Route::get('/verify-otp', [ForgotPasswordController::class, 'showOtpForm']);
    Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOtp']);
    Route::post('/resend-otp', [ForgotPasswordController::class, 'resendOtp']);
    Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm']);
    Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);
    Route::get('/success', [ForgotPasswordController::class, 'showSuccess']);
});

// ============================================================
// AUTH REQUIRED — Hanya user yang sudah login
// ============================================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

    // Review - create & store & delete butuh login
    Route::get('/places/{id}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

// ============================================================
// ADMIN ONLY
// ============================================================
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/lokasi', [AdminController::class, 'lokasi'])->name('lokasi');
    Route::get('/tambah-lokasi', [AdminController::class, 'tambahLokasi'])->name('tambahLokasi');
    Route::get('/ulasan', [AdminController::class, 'ulasan'])->name('ulasan');
    Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('pengguna');
});