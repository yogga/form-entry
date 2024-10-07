<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::paginate(10); // Ambil data dengan pagination
        return view('mahasiswa.index', compact('mahasiswas'));
    }
    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'nilai' => 'required|numeric',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.create')->with('success', 'Data Mahasiswa berhasil disimpan');
    }

     // Menampilkan form edit
     public function edit($id)
     {
         $mahasiswa = Mahasiswa::findOrFail($id);
         return view('mahasiswa.edit', compact('mahasiswa'));
     }

     // Memperbarui data mahasiswa
     public function update(Request $request, $id)
     {
         $request->validate([
             'nama' => 'required',
             'nim' => 'required',
             'nilai' => 'required|numeric',
         ]);

         $mahasiswa = Mahasiswa::findOrFail($id);
         $mahasiswa->update($request->all());

         return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diperbarui');
     }

     // Menghapus data mahasiswa
     public function destroy($id)
     {
         $mahasiswa = Mahasiswa::findOrFail($id);
         $mahasiswa->delete();
         return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus');
     }




}
