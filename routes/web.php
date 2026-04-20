<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =====================
// HALAMAN UTAMA
// =====================
Route::get('/', function () {
    return view('pengaduan'); // langsung ke form pengaduan
});

// =====================
// AUTH (LOGIN & REGISTER)
// =====================
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword']);
Route::post('/forgot-password', [AuthController::class, 'updateForgotPassword']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);


// =====================
// PENGADUAN
// =====================
Route::get('/pengaduan', function () {
    return view('pengaduan');
});

Route::view('/profil', 'profil');

Route::post('/pengaduan/store', [PengaduanController::class, 'store']);


// =====================
// DASHBOARD ADMIN
// =====================
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/detail/{id}', [AdminController::class, 'detail']);
Route::get('/admin/hapus/{id}', [AdminController::class, 'hapus']);
