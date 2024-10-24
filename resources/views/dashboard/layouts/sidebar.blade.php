<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse" style="height: 800px;">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <!-- Dashboard selalu tampil untuk semua pengguna -->
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>

            <!-- Logika If-Else untuk mengecek apakah user adalah admin atau bukan -->
            @if (Auth::user()->role=='1')
                <!-- Jika user adalah admin -->
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/menajemen user">
                        <span data-feather="clipboard"></span>
                        Manajemen User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/kandidat/tampil" title="Manajemen Kandidat">
                        <span data-feather="file-text"></span>
                        <span>Manajemen Kandidat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/perolehan/index" title="Perolehan">
                        <span data-feather="bar-chart"></span>
                        Perolehan
                    </a>
                </li>
            @else
                <!-- Jika user adalah role user biasa -->
                <li class="nav-item">
                    <a class="nav-link" href="/voting" title="voting">
                        <span data-feather="file-text"></span>
                        Voting
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
