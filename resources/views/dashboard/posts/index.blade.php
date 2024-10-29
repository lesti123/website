@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4> Siswa </h4> 
</div>

<div class="card">
    <div class="card-header">
        <div class="card mt-5">
            <div class="d-flex">
                <h5 class="card-header text-white" style="background-color: #4169E1;">Data vote siswa</h5>
                <div class="ms-auto">
                    <!-- Optional button to add more functionality -->
                </div>
                <a ></a>
            </div>

            <div class="card-body">
                <!-- Any additional content can go here -->
            </div>

            <div class="text-center">
                <table class="table table-bordered border-primary" style="width: 65%; margin: 0 auto;">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Kandidat Vote</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->user_name }}</td>
                            <td>{{ $post->user_email }}</td>
                            <td>{{ $post->kandidat_nama }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
