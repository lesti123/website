<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;

class KandidatController extends Controller
{
    public function index()
    {
        $calon = Kandidat::all(); // Mengambil semua kandidat
        return view('dashboard.kandidat.index', compact('calon')); // Mengirim data ke view
    }

    public function create()
    {
        return view('dashboard.kandidat.create'); // Menampilkan form untuk menambah kandidat
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis_calon' => 'required|string|max:255',
            'nama_calon' => 'required|string|max:255',
            'text' => 'required|string',
            'suara' => 'required|integer',
            'id_kelas' => 'required|exists:kelas,id_kelas', // Pastikan id_kelas ada di tabel kelas
        ]);
    
        Kandidat::create([
            'nis_calon' => $request->nis_calon,
            'nama_calon' => $request->nama_calon,
            'text' => $request->text,
            'suara' => $request->suara,
            'id_kelas' => $request->id_kelas,
        ]); // Menyimpan kandidat baru
    
        return redirect()->route('kandidat.index')->with('success', 'Kandidat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kandidat = Kandidat::findOrFail($id); // Menemukan kandidat berdasarkan ID
        return view('dashboard.kandidat.edit', compact('kandidat')); // Menampilkan form untuk mengedit kandidat
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nis_calon' => 'required|string|max:255',
            'nama_calon' => 'required|string|max:255',
            'text' => 'required|string',
            'suara' => 'required|integer',
            'id_kelas' => 'required|exists:kelas,id_kelas', // Validasi id_kelas
        ]);

        $kandidat = Kandidat::findOrFail($id); // Menemukan kandidat berdasarkan ID
        $kandidat->update($request->all()); // Memperbarui data kandidat
        return redirect()->route('dashboard.kandidat.index')->with('success', 'Kandidat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kandidat = Kandidat::findOrFail($id); // Menemukan kandidat berdasarkan ID
        $kandidat->delete(); // Menghapus kandidat
        return redirect()->route('dashboard.kandidat.index')->with('success', 'Kandidat berhasil dihapus.');
    }
}