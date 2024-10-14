@extends('dashboard.layouts.main')

@section('container')
<h4>Tambah siswa</h4>
<form action="{{route('post.submit') }}" method="post">
    @csrf
    <label>NIS</label>
    <input type="number" name="nis" class="form-control mb-2">
    <label>nama</label>
    <input type="text" name="nama" class="form-control b-2">
    <label>kelas</label>
    <input type="text" name="kelas" class="form-control b-2">
    <label>jenis kelamin</label>
    <input type="text" name="jenis_kelamin" class="form-control mb-2">

    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection