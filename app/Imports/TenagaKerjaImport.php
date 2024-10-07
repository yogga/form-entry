<?php

namespace App\Imports;

use App\Models\TenagaKerja;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class TenagaKerjaImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $tenagaKerjaData = [];
        foreach ($rows as $row) {

            if (empty($row['nik']) || empty($row['nomor_kartu_bpjs']) || empty($row['nama_tenaga_kerja']) || empty($row['alamat_tenaga_kerja'])) {
                continue;
            }

            $tenagaKerjaData[] = [
                'nik' => trim($row['nik']),
                'nomor_kartu_bpjs' => trim($row['nomor_kartu_bpjs']),
                'nama_tenaga_kerja' => trim($row['nama_tenaga_kerja']),
                'alamat_tenaga_kerja' => trim($row['alamat_tenaga_kerja']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        if (!empty($tenagaKerjaData)) {
            TenagaKerja::insert($tenagaKerjaData);
        }

      //  \Log::info('Imported Tenaga Kerja: ' , $tenagaKerjaData);
    }
}
