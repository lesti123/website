<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\User;
use App\Models\post;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data posts dan join dengan tabel kandidat untuk mendapatkan nama kandidat
        $posts = DB::table('posts')
            ->join('kandidat', 'posts.kandidat_id', '=', 'kandidat.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'kandidat.nama as kandidat_nama', 'users.name as user_name', 'users.email as user_email')
            ->get();

    
        // Kirim data posts ke view
        return view('dashboard.posts.index', compact('posts'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
      return view('dashboard.posts.tambah') ; //
    }

    public function submit (Request $request){
        $post = new Post();
        $post->nama = $request->nama;
        $post->email = $request->email;
        $post->kandidat_vote = $request->kandidat_vote;
        $post->save();

        return redirect('/dashboard/menajemen user')->with('success', 'Data berhasil ditambahkan');
    }
  
    public function edit($id){
      $post = Post::find($id);
      return view('dashboard.posts.edit', compact('post'));
      
    }

    function update(Request $request,$id) {
      $post = post::find($id);
      $post->nama= $request->nama;
      $post->email= $request->email;
      $post->kandidat_vote = $request->kandidat_vote;
     
      $post->update();

      return redirect('/dashboard/menajemen user')->with('success', 'Data berhasil ditambahkan');
    }

    function delete($id) {
      $post = post::findOrFail($id);
      $post->delete();
      return redirect('/dashboard/menajemen user')->with('success', 'Data berhasil di hapus');
    }

}
