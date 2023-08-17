<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Doctor;
use App\Models\JadwalDokter;

class JadwalDokterController extends Controller
{
    public function index() {
        return Inertia::render('Admin/Dashboard/JadwalDokter',["role" => "admin","doctors" => Doctor::with('jadwal_dokter')->get()]);
    }

    public function edit(Request $request, string $id) {
        $editedJadwalDokter = JadwalDokter::find($id);
        return Inertia::render('Admin/Dashboard/JadwalDokterEdit',['jadwal' => $editedJadwalDokter]);
    }

    public function update(Request $request, string $id) {
        // dd($request);
        JadwalDokter::find($id)
            ->update([
                "senin" => $request->senin,
                "selasa" => $request->selasa,
                "rabu" => $request->rabu,
                "kamis" => $request->kamis,
                "jumat" => $request->jumat,
                "sabtu" => $request->sabtu,
                "minggu" => $request->minggu,
                ]);
        return redirect('/admin-jadwal-dokter');
    }
}
