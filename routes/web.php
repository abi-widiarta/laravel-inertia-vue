<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

Route::middleware('auth:web')->group(function() {
    Route::get('/dashboard', function() {
      
        
        return Inertia::render('Dashboard/Dashboard',["role" => "user"]);
    });

    Route::get('/lakukan-reservasi', function() {
        return Inertia::render('Dashboard/LakukanReservasi');
    });


    Route::get('/reservasi-saya', function() {
        return Inertia::render('Dashboard/ReservasiSaya');
    });

    Route::get('/antrian', function() {
        return Inertia::render('Dashboard/Antrian');
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

    Route::get('/admin/login', function() {
        return Inertia::render("LoginAdmin");
    });
    
    Route::post('/login', [LoginController::class, 'authenticate']);

    Route::post('/admin/login', [LoginController::class, 'authenticateAdmin']);
    
    Route::get('/register-admin', [RegisterController::class, 'index']);
    
    Route::post('/register-admin', [RegisterController::class, 'storeAdmin']);
});

Route::middleware('auth:admin')->group(function() {
    Route::get('/admin-dashboard', function() {
        return Inertia::render('Admin/Dashboard/Dashboard',["role" => "admin"]);
    });
    
    Route::get('/admin-data-pasien', function() {
        return Inertia::render('Admin/Dashboard/DataPasien',["role" => "admin","users" => User::all()]);
    });

    Route::get('/admin-data-dokter', function() {
        return Inertia::render('Admin/Dashboard/DataDokter',["role" => "admin"]);
    });

    Route::get('/admin-jadwal-dokter', function() {
        return Inertia::render('Admin/Dashboard/JadwalDokter',["role" => "admin"]);
    });

    Route::get('/admin-antrian-pemeriksaan', function() {
        return Inertia::render('Admin/Dashboard/AntrianPemeriksaan',["role" => "admin"]);
    });

    Route::get('/admin-pembayaran', function() {
        return Inertia::render('Admin/Dashboard/Pembayaran',["role" => "admin"]);
    });
});

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    // dd($googleUser);

    // if(!str_ends_with($googleUser->email, '@outlook.com')) {
    //     return redirect('/login')->with('error',"Login Failed! Please use SSO");
    // }
    
    $user = User::updateOrCreate([
        'google_id' => $googleUser->id,
    ], [
        'name' => $googleUser->name,
        'username' => null,
        'email' => $googleUser->email,
        'password' => null,
        'google_token' => $googleUser->token,
        'google_refresh_token' => $googleUser->refreshToken,
    ]);
    Auth::login($user);

    return redirect('/dashboard')->with('message', $googleUser->avatar);
});