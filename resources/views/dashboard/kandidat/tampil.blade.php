@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Kandidat</h4>
</div>

<!-- Menampilkan Notifikasi -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <div class="d-flex">
            <h5 class="card-header text-white" style="background-color: #087990;">Data Kandidat</h5>
            <div class="ms-auto">
                <a class="btn btn-success" href="{{ route('dashboard.kandidat.tambah') }}">Tambah Kandidat</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($kandidat as $post)
                <div class="col-md-3 mb-6">
                    <div class="card h-100">
                        <img src="{{ asset('storage/'.$post->foto) }}" class="card-img-top" alt="Foto {{ $post->nama }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->nama }}</h5>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <!-- Button View -->
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{ $post->id }}">
                                View
                            </button>
                            <a href="{{ route('dashboard.kandidat.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('dashboard.kandidat.delete', $post->id) }}" method="post" style="display:inline;">
                                @csrf
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="viewModal{{ $post->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $post->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewModalLabel{{ $post->id }}">Detail Kandidat</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Nama:</strong> {{ $post->nama }}</p>
                                <p><strong>Visi Misi:</strong> {{ $post->visi_misi }}</p>
                                <p><strong>Pengalaman Organisasi:</strong> {{ $post->pengalaman_organisasi }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
