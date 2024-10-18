@extends('dashboard.layouts.main')

@section('container')

<h4>tambah siswa</h4>

<form action="{{route('dashboard.kandidat.submit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label>nama</label>
    <input type="string" name="nama" class="form-control mb-2">  
 <div class="mb-3">
  <label for="foto" class="form-label">foto</label>
  <input class="form-control" type="file" id="foto" name="foto">
</div>
    <label>visi misi</label>
    <input type="text" name="visi_misi" class="form-control mb-2">
    <label>pengalaman_organisasi</label>
    <input type="text" name="pengalaman_organisasi" class="form-control mb-2">

    <button class="btn btn-primary">Tambah</button>
</form>

@endsection