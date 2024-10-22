<html>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sign in</title>

</head>

<body>
  <div class="main">
    <p class="sign" align="center">Sign in</p>
    <form class="form1" method="post" action="{{ route('login.post') }}">
      @csrf
      <input type="email" name="email" class="form-controller" placeholder="Email" required>
      @error('email')
        <div class="error">{{ $message }}</div>
      @enderror

      <input type="password" name="password" class="form-controller" placeholder="Password" required>
      @error('password')
        <div class="error">{{ $message }}</div>
      @enderror

      <button type="submit" class="submit">Masuk</button>
    </form>

    <p class="sign" align="center">Belum Punya Akun? Registrasi <a href="{{ route('registrasi') }}">Disini</a></p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- SweetAlert untuk sukses login -->
  @if (session('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        confirmButtonText: 'OK'
      });
    </script>
  @endif

  <!-- SweetAlert untuk error login -->
  @if ($errors->any())
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Email atau password salah!',
        confirmButtonText: 'OK'
      });
    </script>
  @endif

</body>
</html>
