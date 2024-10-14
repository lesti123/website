@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4> welcome back user </h4> 
 </div>

 <div class="card">
  <div class="card-header">
  <div class="card mt-5">
    <div class="d-flex">
    <h5 class="card-header text-white" style="background-color: #087990;">Data siswa</h5>
        <div class="ms-auto">
        
        </div>
        <a  class=" btn btn-success" href="{{ route('post.tambah')}}">Tambah siswa</a>
    
    </div>
        
        <div class="card-body">
        
 </div>
  <div class="text-center">
    <table class="table table-bordered border-primary" style="width: 65%; margin: 0;">
    
    <thead>
        <tr>
            <th scope="col">NIS</th>
            <th scope="col">Nama</th>
            <th scope="col">Kelas</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Opsi</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->nis }}</td>
            <td>{{ $post->nama }}</td>
            <td>{{ $post->kelas }}</td>
            <td>{{ $post->jenis_kelamin }}</td>
            <td>
            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('post.delete',$post->id) }}" method="post">
                @csrf
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
             </td>
        </tr>
        @endforeach
    </tbody>
</table>




</div>
@endsection