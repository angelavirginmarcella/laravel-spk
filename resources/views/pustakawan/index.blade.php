@extends('layouts.app')

@section('content')
    <h2>Daftar Pustakawan</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('pustakawan.create') }}" class="btn btn-primary">Tambah Data Pustakawan</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pustakawans as $pustakawan)
                <tr>
                    <td>{{ $pustakawan->nip }}</td>
                    <td>{{ $pustakawan->nama }}</td>
                    <td>{{ $pustakawan->alamat }}</td>
                    <td>{{ $pustakawan->jenis_kelamin }}</td>
                    <td>
                        <a href="{{ route('pustakawan.edit', $pustakawan->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('pustakawan.destroy', $pustakawan->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus pustakawan ini?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
