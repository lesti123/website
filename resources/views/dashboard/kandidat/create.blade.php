@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Tambah Kandidat</h4>
</div>

<form action="{{ route('kandidat.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nis_calon" class="form-label">NIS Calon</label>
        <input type="text" class="form-control" id="nis_calon" name="nis_calon" required>
        @error('nis_calon')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="nama_calon" class="form-label">Nama Calon</label>
        <input type="text" class="form-control" id="nama_calon" name="nama_calon" required>
        @error('nama_calon')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Text</label>
        <textarea class="form-control" id="text" name="text" required></textarea>
        @error('text')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="suara" class="form-label">Suara</label>
        <input type="number" class="form-control" id="suara" name="suara" required>
        @error('suara')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="id_kelas" class="form-label">ID Kelas</label>
        <input type="number" class="form-control" id="id_kelas" name="id_kelas" required>
        @error('id_kelas')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('kandidat.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
