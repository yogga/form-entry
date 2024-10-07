@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Tenaga Kerja</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIK</th>
                <th>Nomor Kartu BPJS</th>
                <th>NamaTenaga Kerja</th>
                <th>Alamat Tenaga Kerja</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($tenagaKerjas as $tenagaKerja)
                <tr>
                    <td>{{ $tenagaKerja->id }}</td>
                    <td>{{ $tenagaKerja->nik }}</td>
                    <td>{{ $tenagaKerja->nomor_kartu_bpjs }}</td>
                    <td>{{ $tenagaKerja->nama_tenaga_kerja }}</td>
                    <td>{{ $tenagaKerja->alamat_tenaga_kerja }}</td>
                    <td>
                        <a href="{{ route('tenaga-kerja.edit', $tenagaKerja->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('tenaga-kerja.destroy', $tenagaKerja->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tenagaKerjas->links() }} <!-- Pagination links -->
</div>
@endsection
