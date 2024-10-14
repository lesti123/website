@extends('dashboard.layouts.main')

@section('container')
<h4>Edit siswa</h4>
<form action="{{route('post.update', $post->id ) }}" method="post">
    @csrf
    <label>NIS</label>
    <input type="number" name="nis" value="{{ $post->nis }}" class="form-control mb-2">
    <label>nama</label>
    <input type="text" name="nama" value=" {{$post->nama}}" class="form-control b-2">
    <label>kelas</label>
    <input type="text" name="kelas" value="{{ $post->kelas}}" class="form-control b-2">
    <label>jenis kelamin</label>
    <input type="text" name="jenis_kelamin" value=" {{$post->jenis_kelamin }}" class="form-control mb-2">

    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection