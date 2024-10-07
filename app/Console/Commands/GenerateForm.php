<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateForm extends Command
{
    protected $signature = 'generate:form {type}';
    protected $description = 'Generate form view for a specified type (mahasiswa/tenaga_kerja)';

    public function handle()
    {
        $type = $this->argument('type');

        if ($type === 'mahasiswa') {
            $viewContent = <<<EOT
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <h2>Form Mahasiswa</h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="post" class="needs-validation" novalidate>
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
            <div class="invalid-feedback">Nama diperlukan</div>
        </div>
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
            <div class="invalid-feedback">NIM diperlukan</div>
        </div>
        <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="number" class="form-control" id="nilai" name="nilai" placeholder="Masukkan Nilai" required>
            <div class="invalid-feedback">Nilai diperlukan</div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Mahasiswa</button>
    </form>
</div>
<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        });
    })();
</script>
EOT;

            File::put(resource_path('views/mahasiswa/create.blade.php'), $viewContent);
            $this->info('File create.blade.php untuk Mahasiswa berhasil dibuat.');
        } elseif ($type === 'tenaga_kerja') {
            $viewContent = <<<EOT
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <h2>Form Tenaga Kerja</h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif  

    <form action="{{ route('tenaga-kerja.store') }}" method="post" class="needs-validation" novalidate>
        @csrf
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
            <div class="invalid-feedback">NIK diperlukan</div>
        </div>
        <div class="form-group">
            <label for="nomor_kartu_bpjs">Nomor Kartu BPJS</label>
            <input type="text" class="form-control" id="nomor_kartu_bpjs" name="nomor_kartu_bpjs" placeholder="Masukkan Nomor Kartu BPJS" required>
            <div class="invalid-feedback">Nomor Kartu BPJS diperlukan</div>
        </div>
        <div class="form-group">
            <label for="nama_tenaga_kerja">Nama Tenaga Kerja</label>
            <input type="text" class="form-control" id="nama_tenaga_kerja" name="nama_tenaga_kerja" placeholder="Masukkan Nama Tenaga Kerja" required>
            <div class="invalid-feedback">Nama Tenaga Kerja diperlukan</div>
        </div>
        <div class="form-group">
            <label for="alamat_tenaga_kerja">Alamat Tenaga Kerja</label>
            <input type="text" class="form-control" id="alamat_tenaga_kerja" name="alamat_tenaga_kerja" placeholder="Masukkan Alamat Tenaga Kerja" required>
            <div class="invalid-feedback">Alamat Tenaga Kerja diperlukan</div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Tenaga Kerja</button>
    </form>
</div>
<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        });
    })();
</script>
EOT;

            File::put(resource_path('views/tenaga_kerja/create.blade.php'), $viewContent);
            $this->info('File create.blade.php untuk Tenaga Kerja berhasil dibuat.');
        } else {
            $this->error('Tipe yang dimasukkan tidak valid. Harap masukkan "mahasiswa" atau "tenaga_kerja".');
        }
    }
}
