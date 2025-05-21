<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $fillable = [
        'nomor_polisi', 'merek', 'tipe', 'tahun_kendaraan',
        'warna', 'status_kepemilikan', 'masa_berlaku_stnk',
        'masa_berlaku_kir', 'status'
    ];

    public function penugasans()
    {
        return $this->hasMany(PenugasanSupir::class);
    }
}
