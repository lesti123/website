@extends('dashboard.layouts.main')

@section('container')
<h4>Edit siswa</h4>
<form action="{{route('post.update', $post->id ) }}" method="post">
    @csrf
    <label>Nama</label>
    <input type="text" name="nama" value="{{ $post->nama }}" class="form-control mb-2">
    <label>email</label>
    <input type="text" name="email" value=" {{$post->email}}" class="form-control b-2">
    <label>kandidat vote</label>
    <input type="text" name="kandidat_vote" value="{{ $post->kandidat_vote}}" class="form-control b-2">
    

    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection