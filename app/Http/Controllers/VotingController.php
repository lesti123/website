<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    // Tambahkan 1 vote untuk kandidat
    $kandidat->jumlah_vote += 1; 
    $kandidat->save();

    // Ambil user ID (misalnya menggunakan user yang sedang login)
    $userId = auth()->id();

    // Masukkan user_id dan kandidat_id ke dalam table posts
    DB::table('posts')->insert([
        'user_id' => $userId,
        'kandidat_id' => $kandidat->id,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Voting berhasil dilakukan untuk kandidat ' . $kandidat->nama
    ]);
}
public function getVotingData()
{
    // Ambil data kandidat dengan nama dan jumlah vote
    $kandidat = Kandidat::all(['nama', 'jumlah_vote']);
    return response()->json($kandidat);
}

}

