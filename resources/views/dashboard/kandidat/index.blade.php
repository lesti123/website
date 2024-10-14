@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Selamat datang, Anda login sebagai admin</h4> 
</div>
<a  class=" btn btn-success" href="{{ route('kandidat.create')}}">Tambah Kandidat</a>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Calon</th>
                <th>NIS Calon</th>
                <th>Nama Calon</th>
                <th>Text</th>
                <th>Suara</th>
                <th>ID Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calon as $item)
                <tr>
                    <td>{{ $item->id_calon }}</td>
                    <td>{{ $item->nis_calon }}</td>
                    <td>{{ $item->nama_calon }}</td>
                    <td>{{ $item->text }}</td>
                    <td>{{ $item->suara }}</td>
                    <td>{{ $item->id_kelas }}</td> <!-- Menampilkan ID Kelas -->
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('kandidat.edit', $item->id_calon) }}">Edit</a>
                        <form action="{{ route('kandidat.destroy', $item->id_calon) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection