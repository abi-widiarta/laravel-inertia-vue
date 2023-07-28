<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function index() {
        return Inertia::render('Register');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'nim' => 'required|numeric|digits:10|unique:users',
            'name' => 'required|max:100',
            'username' => 'required|unique:users|max:20',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        User::create($validatedData);

        return redirect('/login');
    }
}
