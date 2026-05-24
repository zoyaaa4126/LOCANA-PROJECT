<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\LandingController;

// ROUTE VIEW PAGES
Route::get('/', [LandingController::class, 'index'])->name('landing.index');

//LOGIN
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UserController::class, 'login']);


//FORGOT PASSWORD
Route::get('/forgot-password', function () {
    return view('forgotPassword');
});

Route::post('/forgot-password', [UserController::class, 'sendResetLink']);

Route::get('/reset-password/{token}', function ($token) {
    return view('reset-password', ['token' => $token]);
});

Route::post('/reset-password', [UserController::class, 'reset']);

//REGISTER
Route::get('/register', function () {
    return view('register');
});

Route::post('/register-step1', [UserController::class, 'registerStep1']);

Route::get('/register-nextStep', function () {
    return view('registerNext');
});

Route::post('/register-nextStep', [UserController::class, 'store']);

Route::get('/home', [UserController::class, 'home']);

// VIEW PAGES
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/syarat', function () {
    return view('syarat');
});

Route::get('/wishlist', function () {
    return view('wishlist');
});




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