<?php

namespace App\Http\Controllers;

use App\Models\TenagaKerja;
use Illuminate\Http\Request;

class TenagaKerjaController extends Controller
{
    public function index()
    {
        $tenagaKerjas = TenagaKerja::paginate(10); // Ambil data dengan pagination
        return view('tenaga_kerja.index', compact('tenagaKerjas'));
    }
    public function create()
    {
        return view('tenaga_kerja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nomor_kartu_bpjs' => 'required',
            'nama_tenaga_kerja' => 'required',
            'alamat_tenaga_kerja' => 'required',
        ]);

        TenagaKerja::create($request->all());

        return redirect()->route('tenaga-kerja.create')->with('success', 'Data Tenaga Kerja berhasil disimpan');
    }

     // Menampilkan form edit
     public function edit($id)
     {
         $tenagaKerjas = TenagaKerja::findOrFail($id);
         return view('tenaga_kerja.edit', compact('tenagaKerjas'));
     }

     // Memperbarui data tenaga kerja
     public function update(Request $request, $id)
     {
         $request->validate([
             'nik' => 'required',
             'nomor_kartu_bpjs' => 'required',
             'nama_tenaga_kerja' => 'required',
             'alamat_tenaga_kerja' => 'required',

         ]);

         $tenagaKerjas = TenagaKerja::findOrFail($id);
         $tenagaKerjas->update($request->all());

         return redirect()->route('tenaga-kerja.index')->with('success', 'Data Mahasiswa berhasil diperbarui');
     }

     // Menghapus data tenaga kerja
     public function destroy($id)
     {
         $tenagaKerjas = TenagaKerja::findOrFail($id);
         $tenagaKerjas->delete();
         return redirect()->route('tenaga-kerja.index')->with('success', 'Data Mahasiswa berhasil dihapus');
     }
}
