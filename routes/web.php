<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\AdminController;

// ROUTE VIEW PAGES
Route::get('/', function () {
    return view('welcome');
});

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

Route::get('/home', function () {
    return view('home');
});

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

// ROUTE CHATBOT
Route::get('/chatbot', [ChatbotController::class, 'index']);
Route::get('/chatbot/step/{key}', [ChatbotController::class, 'getStep']);

//ADMIN
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/lokasi', [AdminController::class, 'lokasi'])->name('lokasi');
Route::get('/tambah-lokasi', [AdminController::class, 'tambahLokasi'])->name('tambahLokasi');
Route::get('/ulasan', [AdminController::class, 'ulasan'])->name('ulasan');
Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('pengguna');
Route::get('/tambah-pengguna', [AdminController::class, 'tambahPengguna'])->name('tambahPengguna');
Route::get('/detail-pengguna', [AdminController::class, 'viewPengguna'])->name('viewPengguna');