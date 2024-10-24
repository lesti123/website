<!-- @extends('dashboard.layouts.main')

@section('container')
<div class="container mt-5">
    <h4>Konfirmasi Voting</h4>
    <p>Anda akan memberikan suara untuk kandidat: <strong>{{ $kandidat->nama }}</strong></p>
    <form action="{{ route('voting.proses', $kandidat->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Konfirmasi Voting</button>
    </form>
</div>
@endsection -->
