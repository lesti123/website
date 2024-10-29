@extends('dashboard.layouts.main')

@section('container')
<h4>Tambah siswa</h4>
<form action="{{route('post.submit') }}" method="post">
    @csrf
    <label>Nama</label>
    <input type="text" name="nama" class="form-control mb-2">
    <label>email</label>
    <input type="text" name="email" class="form-control b-2">
    <label>kandidat vote</label> 
    <input type="text" name="kandidat_vote" class="form-control b-2">
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection  