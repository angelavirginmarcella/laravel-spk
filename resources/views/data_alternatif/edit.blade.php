@extends('layouts.app')

@section('content')
    <h2>Edit Data Alternatif</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('data_alternatif.update', $dataAlternatif->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $dataAlternatif->nama) }}" required>
        </div>
        <div class="form-group">
            <label for="C1">C1</label>
            <input type="number" class="form-control" id="C1" name="C1" value="{{ old('C1', $dataAlternatif->C1) }}" required>
        </div>
        <div class="form-group">
            <label for="C2">C2</label>
            <input type="number" class="form-control" id="C2" name="C2" value="{{ old('C2', $dataAlternatif->C2) }}" required>
        </div>
        <div class="form-group">
            <label for="C3">C3</label>
            <input type="number" class="form-control" id="C3" name="C3" value="{{ old('C3', $dataAlternatif->C3) }}" required>
        </div>
        <div class="form-group">
            <label for="C4">C4</label>
            <input type="number" class="form-control" id="C4" name="C4" value="{{ old('C4', $dataAlternatif->C4) }}" required>
        </div>
        <div class="form-group">
            <label for="C5">C5</label>
            <input type="number" class="form-control" id="C5" name="C5" value="{{ old('C5', $dataAlternatif->C5) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
