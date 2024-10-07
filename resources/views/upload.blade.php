@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2 class="mb-4">Upload Data</h2>

    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="type">Pilih Tipe:</label>
            <select class="form-control" name="type" id="type" required>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="tenaga_kerja">Tenaga Kerja</option>
            </select>
        </div>

        <div class="form-group">
            <label for="file">Pilih File:</label>
            <input type="file" class="form-control-file" name="file" id="file" required>
        </div>

        <button type="submit" class="btn btn-primary">Upload Excel</button>
    </form>

    <hr class="my-4"> <!-- Garis pemisah -->

    <h3 class="mt-4">Data Tersimpan</h3>
    <ul class="list-group">
        <li class="list-group-item"><a href="{{ route('mahasiswa.index') }}">Lihat Data Mahasiswa</a></li>
        <li class="list-group-item"><a href="{{ route('tenagaKerja.index') }}">Lihat Data Tenaga Kerja</a></li>
    </ul>
</div>
@endsection
