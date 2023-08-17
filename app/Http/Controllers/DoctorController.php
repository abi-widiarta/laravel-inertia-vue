<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\JadwalDokter;
use Inertia\Inertia;

class DoctorController extends Controller
{
    public function index() {
        return Inertia::render('Admin/Dashboard/DataDokter',["role" => "admin","users" => Doctor::all()]);
    }

    public function create() {
        return Inertia::render('Admin/Dashboard/DataDokterTambah');
    }

    public function store(Request $request) {
        $newDoctor = [
            "name" => $request->name,
            "address" => $request->address,
            "poli" => $request->poli,
            "gender" => $request->gender,
            "birthdate" => $request->birthdate,
            "nomor_induk_dokter" => $request->nid,
        ];

        Doctor::create($newDoctor);

        $doctor = Doctor::latest()->first();

        $newJadwalDoctor = new JadwalDokter([
            'senin' => null,
            'selasa'=> null,
            'rabu'=> null,
            'kamis'=> null,
            'jumat'=> null,
            'sabtu'=> null,
            'minggu'=> null,
        ]);

        $doctor->jadwal_dokter()->save($newJadwalDoctor);

        return redirect('/admin-data-dokter');
    }

    public function destroy(Request $request) {
        
        Doctor::find($request->id)->jadwal_dokter()->delete();
        Doctor::find($request->id)->delete();
        
        return redirect('/admin-data-dokter');
    }

    public function edit(Request $request, string $id) {
        $editedUser = Doctor::find($id);
        return Inertia::render('Admin/Dashboard/DataDokterEdit',
        ['users' => $editedUser]);
    }

    public function update(Request $request, string $id) {
        Doctor::find($id)
            ->update([
                "name" => $request->name,
                "address" => $request->address,
                "poli" => $request->poli,
                "gender" => $request->gender,
                "birthdate" => $request->birthdate,
                "nomor_induk_dokter" => $request->nid,
                ]);
        return redirect('/admin-data-dokter');
    }
}
