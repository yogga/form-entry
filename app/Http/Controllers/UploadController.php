<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MahasiswaImport;
use App\Imports\TenagaKerjaImport;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        $file = $request->file('file');
       // dd($request);
        // Proses file Excel
        if ($request->input('type') == 'mahasiswa') {
           Excel::import(new MahasiswaImport, $file);
        } elseif ($request->input('type') == 'tenaga_kerja') {
            Excel::import(new TenagaKerjaImport, $file);
        }

        return redirect()->back()->with('success', 'Data berhasil diupload.');
    }
}
