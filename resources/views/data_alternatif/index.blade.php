@extends('layouts.app')

@section('content')
    <h2>Daftar Data Alternatif</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('data_alternatif.create') }}" class="btn btn-primary">Tambah Data Alternatif</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>C1</th>
                <th>C2</th>
                <th>C3</th>
                <th>C4</th>
                <th>C5</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataAlternatifs as $dataAlternatif)
                <tr>
                    <td>{{ $dataAlternatif->nama }}</td>
                    <td>{{ $dataAlternatif->C1 }}</td>
                    <td>{{ $dataAlternatif->C2 }}</td>
                    <td>{{ $dataAlternatif->C3 }}</td>
                    <td>{{ $dataAlternatif->C4 }}</td>
                    <td>{{ $dataAlternatif->C5 }}</td>
                    <td>
                        <a href="{{ route('data_alternatif.edit', $dataAlternatif->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('data_alternatif.destroy', $dataAlternatif->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data alternatif ini?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
