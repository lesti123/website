@extends('dashboard.layouts.main')
@section('container')

<h4>Edit siswa</h4>

<form action="{{route('dashboard.kandidat.update', $kandidat->id) }}" method="post" enctype="multipart/form-data">
    @csrf
   <input type="hidden" name="fotolama" value="{{$kandidat->foto}}">
    <label>nama</label>
    <input type="string" name="nama" value="{{ $kandidat->nama}}" class="form-control mb-2">
    <div class="mb-3">
  <label for="foto" class="form-label">foto</label>
  <input class="form-control" type="file" id="foto" name="foto">
  @if ($kandidat->foto)
  <img src="{{ asset($kandidat->foto) }}" alt="foto {{ $kandidat->nama}}" style="width: 150px; margin-top: 10px;">
  
  @endif
</div>
    <label>visi misi</label>
    <input type="text" name="visi_misi" value="{{ $kandidat->visi_misi }}" class="form-control mb-2">
    <label>pengalaman_organisasi</label>
    <input type="text" name="pengalaman_organisasi"value="{{ $kandidat->pengalaman_organisasi }}" class="form-control mb-2">

    <button class="btn btn-primary">Edit</button>
</form>

@endsection