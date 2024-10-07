<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaKerja extends Model
{
    use HasFactory;

    protected $fillable = ['nik', 'nomor_kartu_bpjs', 'nama_tenaga_kerja', 'alamat_tenaga_kerja'];
}
