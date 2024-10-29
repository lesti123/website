@extends('dashboard.layouts.main')

@section('container')
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<div class="container mt-5">
    <h4>Daftar Kandidat</h4>

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
                        <form action="{{ route('voting.vote', $post->id) }}" method="POST" class="vote-form">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Variabel untuk melacak status voting
        let hasVoted = false;

        // Tangani submit form voting dengan AJAX
        document.querySelectorAll('.vote-form').forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Mencegah pengiriman form secara default

                // Cek apakah pengguna sudah memberikan suara
                if (hasVoted) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan',
                        text: 'Anda sudah melakukan voting.',
                        showConfirmButton: true
                    });
                    return; // Keluar dari fungsi jika sudah voting
                }

                // Ambil URL dan token CSRF
                const actionUrl = form.action;
                const csrfToken = form.querySelector('input[name="_token"]').value;

                // Kirim request AJAX untuk voting
                fetch(actionUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        hasVoted = true; // Set status voting
                        // Tampilkan SweetAlert jika voting berhasil
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // Nonaktifkan tombol setelah voting berhasil
                        form.querySelector('button[type="submit"]').disabled = true; // Nonaktifkan tombol submit
                    } else {
                        // Tampilkan SweetAlert jika voting gagal
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Voting gagal. Coba lagi.',
                            showConfirmButton: true
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan. Coba lagi.',
                        showConfirmButton: true
                    });
                });
            });
        });
    });
</script>
@endsection
