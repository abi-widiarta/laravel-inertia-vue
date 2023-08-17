<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nomor_induk_dokter',
        'gender',
        "birthdate",
        'address',
        'poli',
    ];

    public function jadwal_dokter(): HasOne
    {
        return $this->hasOne(JadwalDokter::class);
    }
}
