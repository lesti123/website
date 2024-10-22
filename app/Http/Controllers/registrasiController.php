<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registrasiController extends Controller
{
    public function registrasiView(){
        return view('registrasi');
    }

    public function registrasi(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Buat user baru
        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password); // Hash password sebelum disimpan
        $user->save();

        // Redirect ke halaman login atau berikan notifikasi berhasil
        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }
    
}
