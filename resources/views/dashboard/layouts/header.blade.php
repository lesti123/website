<header class="navbar navbar-dark sticky-top bg-primary  flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">E-VOTING</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <style>
    .navbar-brand {
    font-weight: bold;
}
.navbar .nav-link {
    color: white;
    font-weight: bold; /* Optional: to make it bold as well */
}

  </style>
  <div class="navbar-nav">
    <div class="nav-item  text-nowrap">
     <form action="/logout" method="post">
      @csrf
      <button type="submit" class="nav-link px-3 bg-primary border-0">
        <span data-feather="logout"></span>
      logout</button>
     </form>
    </div>
  </div>
</header>
