<html>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sign Up</title>

</head>

<body>
  <div class="main">
    <p class="sign" align="center">Sign Up</p>
    <form class="form1" method="post" action="{{ route('registrasi.post') }}">
      @csrf
      <input type="email" name="email" class="form-controller" placeholder="Email" required>
      @error('email')
        <div class="error">{{ $message }}</div>
      @enderror

      <input type="text" name="name" class="form-controller" placeholder="Name" required>
      @error('name')
        <div class="error">{{ $message }}</div>
      @enderror

      <input type="password" name="password" class="form-controller" placeholder="Password" required>
      @error('password')
        <div class="error">{{ $message }}</div>
      @enderror

      <input type="password" name="password_confirmation" class="form-controller" placeholder="Confirm Password" required>
      @error('password_confirmation')
        <div class="error">{{ $message }}</div>
      @enderror

      <button type="submit" class="submit">Sign Up</button>
    </form>
    <p class="sign" align="center">Sudah Punya Akun? Login <a href="{{ route('login') }}">Disini</a></p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



  @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ada kesalahan pada input Anda!',
            confirmButtonText: 'OK'
        });
    </script>
  @endif
</body>
</html>
