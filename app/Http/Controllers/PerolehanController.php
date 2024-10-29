<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;

class PerolehanController extends Controller
{
    public function index()
    {
        // Mengambil semua kanadidat dari database
        $kandidat = Kandidat::all();

        // Mengembalikan view dengan data kandidat
        return view('perolehan.index', compact('kandidat'));
    }
}
