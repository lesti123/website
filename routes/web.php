<?php


use App\Http\Controllers\loginController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\KandidatController;



Route::get('/', function(){
    return view('landing');
});

// Rute GET untuk menampilkan form login
Route::get('/login', [loginController::class, 'login'])->name('login');

// Rute POST untuk menangani proses login
Route::post('/login', [loginController::class, 'authenticate'])->name('login.post');

// Rute untuk dashboard yang memerlukan otentikasi
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth')->name('index');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::post('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::resource('/dashboard/menajemen user',DashboardPostController::class)
->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)
->middleware('auth');

Route::get('/dashboard/posts/index', [DashboardPostController::class, 'index']);



Route::get('/post', [DashboardPostController::class, 'tampil'])->name('post.tampil');
Route::get('/post/tambah', [DashboardPostController::class, 'tambah'])->name('post.tambah');
Route::post('/post/submit', [DashboardPostController::class,'submit'])->name('post.submit');
Route::get('/post/edit/{id}', [DashboardPostController::class, 'edit'])->name('post.edit');
Route::post('/post/update/{id}', [DashboardPostController::class, 'update'])->name('post.update');
Route::post('/post/delete/{id}', [DashboardPostController::class, 'delete'])->name('post.delete');

Route::resource('/dashboard/menajemen kandidat',KandidatController::class)
->middleware('auth');

Route::resource('/dashboard/ kandidat',KandidatController::class)
->middleware('auth');

Route::get('/kandidat', [KandidatController::class, 'tampil'])->name('kandidat.tampil');
Route::get('/dashboard/kandidat/tampil',[KandidatController::class, 'tampil'])->name('kandidat.tampil');
Route::get('/dashboard/kandidat/tambah',[KandidatController::class, 'tambah'])->name('dashboard.kandidat.tambah');
Route::post('/dashboard/kandidat/submit', [KandidatController::class,'submit'])->name('dashboard.kandidat.submit');
Route::get('/dashboard/kandidat/edit/{id}', [KandidatController::class, 'edit'])->name('dashboard.kandidat.edit');
Route::post('/dashboard/kandidat/update/{id}', [KandidatController::class, 'update'])->name('dashboard.kandidat.update');
Route::post('/dashboard/kandidat/delete/{id}', [KandidatController::class, 'delete'])->name('dashboard.kandidat.delete');    
  
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register-proses', [UserController::class, 'proses'])->name('register-proses');

Route::get('/loginsiswa',function(){
    return view('login', [
        'jenis'
    ]);
});