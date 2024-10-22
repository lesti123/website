<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login()
    {
        return view('login',[
            'jenis' =>'admin'
        ]);
    }

    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Proses login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek role user
            if (Auth::user()->role == 0) {
                return redirect()->intended('/siswa')->with('success', 'Login berhasil sebagai siswa!');
            } elseif (Auth::user()->role == 1) {
                return redirect()->intended('/dashboard')->with('success', 'Login berhasil sebagai admin!');
            }
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }
}
