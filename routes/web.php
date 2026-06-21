<?php

use Illuminate\Support\Facades\Route;

// Halaman Login (Akses pertama)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Halaman Utama Dashboard setelah Login
Route::get('/', function () {
    return view('bisa.index');
})->name('dashboard');