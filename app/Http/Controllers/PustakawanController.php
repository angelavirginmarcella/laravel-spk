<?php
namespace App\Http\Controllers;

use App\Models\Pustakawan;
use App\Models\DataAlternatif;
use Illuminate\Http\Request;

class PustakawanController extends Controller
{
    public function index()
    {
        $pustakawans = Pustakawan::all();
        return view('pustakawan.index', compact('pustakawans'));
    }

    public function create()
    {
        return view('pustakawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:pustakawans,nip',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $pustakawan = Pustakawan::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        $dataAlternatif = DataAlternatif::where('nama', $request->nama)->first();
        if (!$dataAlternatif) {
            DataAlternatif::create([
                'nama' => $request->nama,
                'C1' => 0,
                'C2' => 0,
                'C3' => 0,
                'C4' => 0,
                'C5' => 0,
            ]);
        }

        return redirect()->route('pustakawan.index')->with('success', 'Pustakawan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pustakawan = Pustakawan::findOrFail($id);
        return view('pustakawan.edit', compact('pustakawan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required|unique:pustakawans,nip,'.$id,
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $pustakawan = Pustakawan::findOrFail($id);
        $pustakawan->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('pustakawan.index')->with('success', 'Pustakawan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pustakawan = Pustakawan::findOrFail($id);
        $pustakawan->delete();

        return redirect()->route('pustakawan.index')->with('success', 'Pustakawan berhasil dihapus.');
    }
}
