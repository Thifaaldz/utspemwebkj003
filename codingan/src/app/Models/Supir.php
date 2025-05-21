<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    protected $fillable = [
        'nama', 'nik', 'telepon', 'alamat',
        'nomor_sim', 'jenis_sim', 'masa_berlaku_sim',
        'tanggal_mulai_kerja', 'status'
    ];

    public function penugasans()
    {
        return $this->hasMany(PenugasanSupir::class);
    }
}
