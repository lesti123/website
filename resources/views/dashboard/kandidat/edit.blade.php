@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Edit Kandidat</h4> 
</div>

<form action="{{ route('kandidat.update', $kandidat->id_calon) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nis_calon" class="form-label">NIS Calon</label>
        <input type="text" class="form-control" id="nis_calon" name="nis_calon" value="{{ $kandidat->nis_calon }}" required>
    </div>
    <div class="mb-3">
        <label for="nama_calon" class="form-label">Nama Calon</label>
        <input type="text" class="form-control" id="nama_calon" name="nama_calon" value="{{ $kandidat->nama_calon }}" required>
    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Text</label>
        <textarea class="form-control" id="text" name="text" required>{{ $kandidat->text }}</textarea>
    </div>
    <div class="mb-3">
        <label for="suara" class="form-label">Suara</label>
        <input type="number" class="form-control" id="suara" name="suara" value="{{ $kandidat->suara }}" required>
    </div>
    <div class="mb-3">
        <label for="id_kelas" class="form-label">ID Kelas</label>
        <input type="number" class="form-control" id="id_kelas" name="id_kelas" value="{{ $kandidat->id_kelas }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('kandidat.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection