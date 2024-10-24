@extends('dashboard.layouts.main')

@section('container')
<div class="container mt-5">
    <h4>Daftar Kandidat</h4>

    <!-- Menampilkan Notifikasi -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @foreach ($kandidat as $post)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/'.$post->foto) }}" class="card-img-top" alt="Foto {{ $post->nama }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->nama }}</h5>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{ $post->id }}">
                            View
                        </button>
                        <form action="{{ route('voting.vote', $post->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Voting</button>
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
@endsection
