<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Halaman publik
Route::get('/', function () {
    return Auth::check() ? redirect()->route('home') : view('landing');
})->name('landing');

// Hanya untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/daftar', [RegisterController::class, 'show'])->name('register');
    Route::post('/daftar', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/masuk', [LoginController::class, 'show'])->name('login');
    Route::post('/masuk', [LoginController::class, 'store'])->name('login.store');
});

// Wajib login
Route::middleware('auth')->group(function () {
    Route::post('/keluar', [LoginController::class, 'logout'])->name('logout');

    Route::get('/beranda', [HomeController::class, 'index'])->name('home');

    Route::get('/ide', [IdeaController::class, 'index'])->name('ideas.index');
    Route::get('/ide/tambah', [IdeaController::class, 'create'])->name('ideas.create');
    Route::post('/ide', [IdeaController::class, 'store'])->name('ideas.store');
    Route::get('/ide/{idea}', [IdeaController::class, 'show'])->name('ideas.show');

    Route::get('/profil', [ProfileController::class, 'show'])->name('profile');
});