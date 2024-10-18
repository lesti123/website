<?php

namespace App\Http\Controllers;
use App\Models\Kandidat;

use Illuminate\Http\Request;

class KandidatController extends Controller
{
   
   function tampil() {//
    $kandidat = kandidat::get();
    return view('dashboard.kandidat.tampil', compact('kandidat'));
   }

   function tambah() {
    return view('dashboard.kandidat.tambah');
   }
  
   function submit(Request $request) 
   {
    
    $kandidat = new kandidat();
    $kandidat->nama = $request->nama;
    
       
    

    $kandidat->foto = $request->file('foto')->store('foto');

    $kandidat->visi_misi = $request->visi_misi;
    $kandidat->pengalaman_organisasi= $request->pengalaman_organisasi;
    $kandidat->save();
    return redirect('/dashboard/kandidat/tampil')->with('success', 'Data berhasil ditambahkan');
   }

   public function edit($id){
    $kandidat = Kandidat::find($id);
    return view('dashboard.kandidat.edit', compact('kandidat'));
}

function update(Request $request,$id) {

    // dd('berhasil');
    $kandidat = kandidat::find($id);
    $kandidat->nama = $request->nama;
    if ($request->file('foto')){
      $kandidat->foto= $request->file('foto')->store('foto');

    }
    else{
      $kandidat->foto= $request->fotolama;
    }
    $kandidat->visi_misi = $request->visi_misi;
    $kandidat->pengalaman_organisasi = $request->pengalaman_organisasi;
    $kandidat->update();

    return redirect('/dashboard/kandidat/tampil')->with('success', 'Data berhasil ditambahkan');
    
  }

  function delete($id) {
    $kandidat = kandidat::findOrFail($id);
    $kandidat->delete();
    return redirect('/dashboard/kandidat/tampil')->with('success', 'Data berhasil di hapus');
  }

}