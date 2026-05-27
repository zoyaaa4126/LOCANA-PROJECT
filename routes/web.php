<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PlaceDetailsController;
use App\Http\Controllers\ForgotPasswordController;
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

Route::get('/forgot-password', function () {
    return view('forgotPassword');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/register-nextStep', function () {
    return view('registerNext');
});

Route::post('/register-nextStep', [UserController::class, 'store']);
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

Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('pengguna');

Route::get('/profile', [UserController::class, 'profile']);

// Wishlist
Route::get('/wishlist', [WishlistController::class, 'index']);
Route::post('/wishlist/toggle', [WishlistController::class, 'toggle']);

Route::middleware('auth')->group(function () {


    // Review
    Route::get('/reviews', [ReviewController::class, 'index']);
    Route::post('/reviews', [ReviewController::class, 'store']);
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);

});
