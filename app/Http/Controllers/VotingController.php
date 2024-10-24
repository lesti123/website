<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;

class VotingController extends Controller
{
    // Menampilkan daftar kandidat
    public function index()
    {
        $kandidat = Kandidat::all();
        return view('voting.index', compact('kandidat'));
    }

    // Menangani proses voting
    public function vote($id)
    {
        // Ambil kandidat berdasarkan ID
        $kandidat = Kandidat::findOrFail($id);

        // Logika untuk proses voting (misalnya, menyimpan voting ke database)
        // Implementasikan sesuai kebutuhan, misalnya menyimpan hasil voting

        return redirect()->route('voting.index')->with('success', 'Voting berhasil dilakukan untuk kandidat ' . $kandidat->nama);
    }
}

