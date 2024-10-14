<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        // Logout pengguna
        Auth::logout();

        // Hapus session dan regenerasi token untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Arahkan ke halaman landing page setelah logout
        return redirect('/');
    }
}
 