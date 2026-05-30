<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResetPasswordController;

// ROUTE VIEW PAGES
Route::get('/', function () {
    return view('welcome');
});

//LOGIN
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

Route::get('/register-nextStep', [UserController::class, 'registerNext']);
// ->middleware('guest');

Route::post('/register-nextStep', [UserController::class, 'store']);
// ->middleware('guest');

Route::get('/home', [UserController::class, 'home']) ->middleware('auth');

// PROFILE
Route::get('/profile', [UserController::class, 'profile']) ->middleware('auth');

Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('editProfile')->middleware('auth');
Route::post('/edit-profile', [UserController::class, 'updateProfile'])->middleware('auth');

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

// ROUTE CHATBOT
Route::get('/chatbot', [ChatbotController::class, 'index']);
Route::get('/chatbot/step/{key}', [ChatbotController::class, 'getStep']);

//ADMIN
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('auth');
    Route::get('/lokasi', [AdminController::class, 'lokasi'])->name('lokasi')->middleware('auth');
    Route::get('/tambah-lokasi', [AdminController::class, 'tambahLokasi'])->name('tambahLokasi')->middleware('auth');
    Route::get('/ulasan', [AdminController::class, 'ulasan'])->name('ulasan')->middleware('auth')->middleware('auth');
    Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('pengguna')->middleware('auth');
    Route::get('/tambah-pengguna', [AdminController::class, 'tambahPengguna'])->name('tambahPengguna')->middleware('auth');
    Route::get('/detail-pengguna', [AdminController::class, 'viewPengguna'])->name('viewPengguna')->middleware('auth');
    Route::get('/profile-admin', [AdminController::class, 'profileAdmin'])->name('profileAdmin')->middleware('auth');
