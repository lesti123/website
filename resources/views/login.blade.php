<html>

  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sign in</title>

</head>

<body>
  <div class="main">
    <p class="sign" align="center">Sign in</p>
 @if ($jenis == 'admin')
 <form class="form1" method="post" action="{{ route('login.post') }}">
      @csrf
      <input type="email" name="email" class="form-controller" placeholder="Email" required>
      <input type="password" name="password" class="form-controller" placeholder="Password" required>
      <button type="submit" class="submit">Masuk</button>
    </form>
    
 @endif
    

    <p class="forgot" align="center"><a href="#">Forgot Password?</a></p>
  </div>
</body>

</html>
