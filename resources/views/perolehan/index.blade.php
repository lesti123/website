@extends('dashboard.layouts.main')

@section('container')

<html>
<head>
  <title>E-Voting Results</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <h1>E-Voting Results</h1>
  <canvas id="votingChart"></canvas>

  <script>
    // Data contoh, Anda bisa mengambil data dari database
    var candidates = ['Candidate A', 'Candidate B', 'Candidate C'];
    var voteCount = [400, 320, 180];
    var totalVotes = voteCount.reduce((a, b) => a + b, 0);

    var ctx = document.getElementById('votingChart').getContext('2d');
    var votingChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: candidates,
        datasets: [{
          label: 'Votes',
          data: voteCount,
          backgroundColor: [
            '#4e73df',
            '#1cc88a',
            '#36b9cc'
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
            text: 'E-Voting '
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return `${context.label}: ${context.formattedValue} votes (${((context.raw / totalVotes) * 100).toFixed(2)}%)`;
              }
            }
          }
        }
      }
    });
  </script>
</body>
</html>
@endsection