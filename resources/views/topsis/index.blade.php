@extends('layouts.app')

@section('title', 'Hasil Perhitungan TOPSIS')

@section('content')

<h1>Hasil Perhitungan</h1>

<h2> Normalisasi</h2>
<table class="normalisasi-table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
        </tr>
    </thead>
    <tbody>
        @foreach($normalized as $id => $result)
        <tr>
            <td>{{ $alternatifs->find($id)->nama }}</td>
            <td>{{ $result['C1'] }}</td>
            <td>{{ $result['C2'] }}</td>
            <td>{{ $result['C3'] }}</td>
            <td>{{ $result['C4'] }}</td>
            <td>{{ $result['C5'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2> Normalisasi Terbobot</h2>
<table class="normalisasi-table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
        </tr>
    </thead>
    <tbody>
        @foreach($weightedNormalized as $id => $result)
        <tr>
            <td>{{ $alternatifs->find($id)->nama }}</td>
            <td>{{ $result['C1'] }}</td>
            <td>{{ $result['C2'] }}</td>
            <td>{{ $result['C3'] }}</td>
            <td>{{ $result['C4'] }}</td>
            <td>{{ $result['C5'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2>Solusi Ideal</h2>
<table class="normalisasi-table">
    <thead>
        <tr>
            <th>Kriteria</th>
            <th>Solusi Ideal Positif (A+)</th>
            <th>Solusi Ideal Negatif (A-)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>C1</td>
            <td>{{ $idealPositive['C1'] }}</td>
            <td>{{ $idealNegative['C1'] }}</td>
        </tr>
        <tr>
            <td>C2</td>
            <td>{{ $idealPositive['C2'] }}</td>
            <td>{{ $idealNegative['C2'] }}</td>
        </tr>
        <tr>
            <td>C3</td>
            <td>{{ $idealPositive['C3'] }}</td>
            <td>{{ $idealNegative['C3'] }}</td>
        </tr>
        <tr>
            <td>C4</td>
            <td>{{ $idealPositive['C4'] }}</td>
            <td>{{ $idealNegative['C4'] }}</td>
        </tr>
        <tr>
            <td>C5</td>
            <td>{{ $idealPositive['C5'] }}</td>
            <td>{{ $idealNegative['C5'] }}</td>
        </tr>
    </tbody>
</table>

<h2>Jarak(D+) dan (D-)</h2>
<table class="normalisasi-table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Jarak ke A+ (D+)</th>
            <th>Jarak ke A- (D-)</th>
        </tr>
    </thead>
    <tbody>
        <!-- @foreach($separationMeasures as $id => $result) -->
        <tr>
            <td>{{ $alternatifs->find($id)->nama }}</td>
            <td>{{ $result['dPositive'] }}</td>
            <td>{{ $result['dNegative'] }}</td>
        </tr>
        <!-- @endforeach -->
    </tbody>
</table>

<h2>Nilai Preferensi (V)</h2>
<table class="normalisasi-table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Nilai Preferensi (V)</th>
            <th>Peringkat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rankedResults as $id => $result)
        <tr>
            <td>{{ $result['nama'] }}</td>
            <td>{{ $result['preferenceValue'] }}</td>
            <td>{{ $result['rank'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
