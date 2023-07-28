<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;



class LoginController extends Controller
{
    public function index() {
        return Inertia::render('Login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required','max:20'],
            'password' => ['required'],
        ]);

        
        
        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();  

            return redirect()->intended('dashboard');
        }

        // Alert::alert('Login Failed', 'Please Enter The Correct Data', 'error');

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
