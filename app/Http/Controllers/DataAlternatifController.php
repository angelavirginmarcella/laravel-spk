<?php

namespace App\Http\Controllers;

use App\Models\DataAlternatif;
use Illuminate\Http\Request;

class DataAlternatifController extends Controller
{
    public function index()
    {
        $dataAlternatifs = DataAlternatif::all();
        return view('data_alternatif.index', compact('dataAlternatifs'));
    }

    public function create()
    {
        return view('data_alternatif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:data_alternatifs,nama',
            'C1' => 'required|integer',
            'C2' => 'required|integer',
            'C3' => 'required|integer',
            'C4' => 'required|integer',
            'C5' => 'required|integer',
        ]);

        DataAlternatif::create($request->all());

        return redirect()->route('data_alternatif.index')->with('success', 'Data Alternatif berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dataAlternatif = DataAlternatif::findOrFail($id);
        return view('data_alternatif.edit', compact('dataAlternatif'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:data_alternatifs,nama,'.$id,
            'C1' => 'required|integer',
            'C2' => 'required|integer',
            'C3' => 'required|integer',
            'C4' => 'required|integer',
            'C5' => 'required|integer',
        ]);

        $dataAlternatif = DataAlternatif::findOrFail($id);
        $dataAlternatif->update($request->all());

        return redirect()->route('data_alternatif.index')->with('success', 'Data Alternatif berhasil diupdate.');
    }

    public function destroy($id)
    {
        $dataAlternatif = DataAlternatif::findOrFail($id);
        $dataAlternatif->delete();

        return redirect()->route('data_alternatif.index')->with('success', 'Data Alternatif berhasil dihapus.');
    }
}
