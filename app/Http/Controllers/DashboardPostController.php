<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
       $posts = Post::get();
       return view('dashboard.posts.index',compact('posts')); // Kirim data posts ke view
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
