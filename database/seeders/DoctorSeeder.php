<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctor1 = [
            'name'=> 'Dr. Joan',
            'nomor_induk_dokter'=> '1231231233',
            'gender'=> 'P',
            "birthdate"=> '1994-12-12',
            'address'=> 'Jl. Mangga',
            'poli'=> 'Gigi',
        ];

        $doctor2 = [
            'name'=> 'Dr. Andrew',
            'nomor_induk_dokter'=> '1231231233',
            'gender'=> 'L',
            "birthdate"=> '1994-12-12',
            'address'=> 'Jl. Durian',
            'poli'=> 'Umum',
        ];

        Doctor::create($doctor1);
        Doctor::create($doctor2);
    }
}
