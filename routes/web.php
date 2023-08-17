<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\JadwalDokterController;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

Route::middleware('auth:web')->group(function() {
    Route::get('/dashboard', function() {

        if(Auth::user()->gender == null) {
            return redirect('/login/profiling')->with('toast_error', 'Please Complete Profile First!');
        }
        // return Inertia::render('LoginProfiling')->with('error', 'Please Fill the profile first!');
        
        return Inertia::render('Dashboard/Dashboard',["role" => "user"]);
    });

    Route::get('/lakukan-reservasi', function() {
        // dd();
        return Inertia::render('Dashboard/LakukanReservasi',['doctors' => Doctor::with('jadwal_dokter')->get()]);
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

});

Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/logout-admin', [LoginController::class, 'logoutAdmin']);

Route::middleware('guest')->group(function() {
    Route::get('/', function () {
        return Inertia::render('Landingpage');
    });
    
    Route::get('/login', [LoginController::class, 'index'])->name('login');

    Route::get('/admin-login', function() {
        // dd(Auth::user());
        return Inertia::render("LoginAdmin");
    });
    
    Route::post('/login', [LoginController::class, 'authenticate']);

    Route::post('/admin-login', [LoginController::class, 'authenticateAdmin']);
    
    Route::get('/register-admin', [RegisterController::class, 'index']);
    
    Route::post('/register-admin', [RegisterController::class, 'storeAdmin']);
});

Route::middleware('auth:admin')->group(function() {
    Route::get('/admin-dashboard', function() {
        // dd(Auth::user());
        return Inertia::render('Admin/Dashboard/Dashboard',["role" => "admin"]);
    });
    
    Route::get('/admin-data-pasien',[PasienController::class, 'index']); 

    Route::get('/admin-data-pasien/create',[PasienController::class, 'create']); 

    Route::post('/admin-data-pasien/store',[PasienController::class, 'store']); 

    Route::post('/admin/delete-pasien', [PasienController::class, 'destroy']);

    Route::get('/admin-data-pasien/{id}/edit', [PasienController::class, 'edit']);

    Route::post('/admin-data-pasien/{id}/update', [PasienController::class, 'update']);
    
    Route::get('/admin-data-dokter',[DoctorController::class, 'index']);

    Route::get('/admin-data-dokter/create',[DoctorController::class, 'create']);

    Route::post('/admin-data-dokter/store',[DoctorController::class, 'store']);

    Route::get('/admin-data-dokter/{id}/edit',[DoctorController::class, 'edit']);

    Route::post('/admin-data-dokter/{id}/update', [DoctorController::class, 'update']);

    Route::post('/admin/delete-dokter', [DoctorController::class, 'destroy']);

    Route::get('/admin-jadwal-dokter', [JadwalDokterController::class, 'index']);

    Route::get('/admin-jadwal-dokter/{id}/edit', [JadwalDokterController::class, 'edit']);

    Route::post('/admin-jadwal-dokter/{id}/update', [JadwalDokterController::class, 'update']);

    Route::get('/admin-antrian-pemeriksaan', function() {
        // dd(Auth::user());
        return Inertia::render('Admin/Dashboard/AntrianPemeriksaan',["role" => "admin"]);
    });

    Route::get('/admin-pembayaran', function() {
        dd(Auth::user());
        return Inertia::render('Admin/Dashboard/Pembayaran',["role" => "admin"]);
    });
});

Route::get('/auth/redirect', function () {

    
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    $newUser = User::where('email', $googleUser->email);
    
    if($newUser->exists()) {
        $newUser = User::updateOrCreate([
            'email' => $googleUser->email,
        ], [
            'google_id' => $googleUser->id,
            'name' => $googleUser->name,
            'username' => null,
            'password' => null,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);

        Auth::login($newUser);
    
        return redirect('/login/profiling')->with('message', $googleUser->avatar);
    }
    
    $user = User::updateOrCreate([
        'google_id' => $googleUser->id,
    ], [
        'name' => $googleUser->name,
        'username' => null,
        'gender' => null,
        'birthdate' => null,
        'email' => $googleUser->email,
        'password' => null,
        'google_token' => $googleUser->token,
        'google_refresh_token' => $googleUser->refreshToken,
    ]);
    Auth::login($user);

    return redirect('/login/profiling')->with('message', $googleUser->avatar);
});

Route::get('/login/profiling', function() {
    if(Auth::user()->gender != null) {
        return redirect('/dashboard');
    } else {
        return Inertia::render('LoginProfiling');
    }
});

Route::post('/login/profiling', function(Request $request) {
    // dd($request->birthdate);
    User::where('email', $request->email)
        ->update(['gender' => $request->gender, 'birthdate' => $request->birthdate]);
    return redirect('/dashboard');
});


// Route::resource('admin-data-pasien', PasienController::class);