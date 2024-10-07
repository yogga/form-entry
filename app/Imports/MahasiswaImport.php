<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class MahasiswaImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $mahasiswaData = [];

        foreach ($rows as $row) {
            // Cek jika Nim, Nama, atau Nilai kosong
            if (empty($row['nim']) || empty($row['nama']) || is_null($row['nilai'])) {
                continue; // Lewati baris ini jika ada yang kosong
            }

            $mahasiswaData[] = [
                'nim' => trim($row['nim']),
                'nama' => trim($row['nama']),
                'nilai' => (float)$row['nilai'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Melakukan batch insert jika ada data
        if (!empty($mahasiswaData)) {
            Mahasiswa::insert($mahasiswaData);
        }

    //    \Log::info('Imported Mahasiswa: ' , $mahasiswaData);
    }
}
