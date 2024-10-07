<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\TenagaKerja;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function storeMahasiswa(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:20',
            'nilai' => 'required|numeric',
        ]);

        Mahasiswa::create($validatedData);
        return response()->json(['message' => 'Data Mahasiswa berhasil disimpan']);
    }

    public function storeTenagaKerja(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|string|max:20',
            'nomor_kartu_bpjs' => 'required|string|max:30',
            'nama_tenaga_kerja' => 'required|string|max:100',
            'alamat_tenaga_kerja' => 'required|string|max:255',
        ]);

        TenagaKerja::create($validatedData);
        return response()->json(['message' => 'Data Tenaga Kerja berhasil disimpan']);
    }
}
