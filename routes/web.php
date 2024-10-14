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


Route::get('/dashboard/kandidat/index', [KandidatController::class, 'index'])->name('kandidat.index');
Route::prefix('kandidat')->group(function () {
    Route::get('/', [KandidatController::class, 'index'])->name('kandidat.index'); // Menampilkan daftar kandidat
    Route::get('/create', [KandidatController::class, 'create'])->name('kandidat.create'); // Form untuk menambah kandidat
    Route::post('/', [KandidatController::class, 'store'])->name('kandidat.store'); // Menyimpan kandidat baru
    Route::get('/{id}/edit', [KandidatController::class, 'edit'])->name('kandidat.edit'); // Form untuk edit kandidat
    Route::put('/{id}', [KandidatController::class, 'update'])->name('kandidat.update'); // Update kandidat
    Route::delete('/{id}', [KandidatController::class, 'destroy'])->name('kandidat.destroy'); // Hapus kandidat
    Route::resource('kandidat', KandidatController::class);
});