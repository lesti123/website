@extends('dashboard.layouts.main')

@section('container')

<head>
  <title>E-Voting</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<h1>E-Voting</h1>
<canvas id="votingChart"></canvas>

<script>
 var kandidat = @json($kandidat->pluck('nama')); // Mengambil nama kandidat dari PHP
var jumlahVote = @json($kandidat->pluck('jumlah_vote')); // Mengambil jumlah vote dari PHP


  var ctx = document.getElementById('votingChart').getContext('2d');
  var votingChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: kandidat,
      datasets: [{
        label: 'Votes',
        data: jumlahVote,
        backgroundColor: [
          '#4e73df',
          '#1cc88a',
          '#36b9cc',
          // Tambahkan warna jika ada lebih banyak kandidat
        ]
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
        title: {
          display: true,
          text: 'E-Voting'
        },
        tooltip: {
          callbacks: {
            label: function(context) {
              return `${context.label}: ${context.formattedValue} votes`;
            }
          }
        }
      }
    }
  });
</script>

@endsection
