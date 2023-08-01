<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class PasienController extends Controller
{
    public function index() {
        return Inertia::render('Admin/Dashboard/DataPasien',["role" => "admin","users" => User::all()]);
    }

    public function create() {
        return Inertia::render('Admin/Dashboard/DataPasienTambah');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'gender' => 'required',
            'email' => 'required|unique:users|email:rfc,dns',
            'birthdate' => 'required'
        ]);

        $validatedData['google_id'] = null;

        User::create($validatedData);

        return redirect('/admin-data-pasien');
    }

    public function destroy(Request $request) {
        User::where('id', $request->id)->delete();
        return redirect('/admin-data-pasien');
    }

    public function edit(Request $request, string $id) {
        $editedUser = User::find($id);
        return Inertia::render('Admin/Dashboard/DataPasienEdit',
        ['id' => $id,'name' => $editedUser->name,'email' => $editedUser->email,'gender' => $editedUser->gender,'birthdate' => $editedUser->birthdate ]);
    }

    public function update(Request $request, string $id) {
        User::find($id)
            ->update(['name' => $request->name,'gender' => $request->gender, 'birthdate' => $request->birthdate]);
        return redirect('/admin-data-pasien');
    }
}
