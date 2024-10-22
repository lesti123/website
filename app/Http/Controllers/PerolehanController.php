<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerolehanController extends Controller
{
    public function index()
    {
        return view('perolehan.index');
    }
}
