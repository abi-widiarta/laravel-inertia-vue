<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function() {
        return Inertia::render('Dashboard/Dashboard');
    });

    Route::get('/lakukan-reservasi', function() {
        return Inertia::render('Dashboard/LakukanReservasi');
    });


    Route::get('/reservasi-saya', function() {
        return Inertia::render('Dashboard/ReservasiSaya');
    });

    Route::get('/riwayat-pemeriksaan', function() {
        return Inertia::render('Dashboard/RiwayatPemeriksaan');
    });

    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::middleware('guest')->group(function() {
    Route::get('/', function () {
        return Inertia::render('Landingpage');
    });
    
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    
    Route::post('/login', [LoginController::class, 'authenticate']);
    
    Route::get('/register', [RegisterController::class, 'index']);
    
    Route::post('/register', [RegisterController::class, 'store']);
});