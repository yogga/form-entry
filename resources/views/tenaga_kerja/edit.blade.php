@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Tenaga Kerja</h2>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <form action="{{ route('tenaga-kerja.update', $tenagaKerjas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" name="nik" value="{{ $tenagaKerjas->nik }}" required>
        </div>
        <div class="mb-3">
            <label for="nomor_kartu_bpjs" class="form-label">Nomor Kartu BPJS</label>
            <input type="text" class="form-control" name="nomor_kartu_bpjs" value="{{ $tenagaKerjas->nomor_kartu_bpjs }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_tenaga_kerja" class="form-label">Nama Tenaga Kerja</label>
            <input type="text" class="form-control" name="nama_tenaga_kerja" value="{{ $tenagaKerjas->nama_tenaga_kerja }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat_tenaga_kerja" class="form-label">Alamat Tenaga Kerja</label>
            <input type="text" class="form-control" name="alamat_tenaga_kerja" value="{{ $tenagaKerjas->alamat_tenaga_kerja }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tenaga-kerja.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
