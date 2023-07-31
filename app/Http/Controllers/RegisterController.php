<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegisterController extends Controller
{
public function index() {
        return Inertia::render('Register');
    }

    public function storeAdmin(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|unique:users|max:20',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($request->password);
        $validatedData['admin_id'] = 321;

        Admin::create($validatedData);

        return redirect('/admin-login');
    }
}
