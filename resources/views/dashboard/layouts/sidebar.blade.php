<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark  sidebar collapse" style="height: 800px;">
    <div class="position-sticky pt-3">
    <ul class="nav flex-column">
    <!-- Dashboard selalu tampil untuk semua pengguna -->
    <li class="nav-item">
        <a class="nav-link active d-flex align-items-center" aria-current="page" href="/dashboard">
            <span data-feather="home" class="me-2"></span>
            <span class="text">Dashboard</span>
        </a>
    </li>
<style>
    .nav-item .text {
    color: white;
    
}

</style>
    <!-- Logika If-Else untuk mengecek apakah user adalah admin atau bukan -->
    @if (Auth::user()->role == '1')
        <!-- Jika user adalah admin -->
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="/dashboard/menajemen user">
                <span data-feather="clipboard" class="me-2"></span>
                <span class="text">Manajemen User</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="/dashboard/kandidat/tampil" title="Manajemen Kandidat">
                <span data-feather="file-text" class="me-2"></span>
                <span class="text">Manajemen Kandidat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="/perolehan/index" title="Perolehan">
                <span data-feather="bar-chart" class="me-2"></span>
                <span class="text">Perolehan</span>
            </a>
        </li>
    @else
        <!-- Jika user adalah role user biasa -->
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="/voting" title="voting">
                <span data-feather="file-text" class="me-2"></span>
                <span class="text">Voting</span>
            </a>
        </li>
    @endif
</ul>

    </div>
</nav>
