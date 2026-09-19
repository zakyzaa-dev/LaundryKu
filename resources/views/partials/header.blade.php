<header>
    <div class="py-3 text-white" style="background-color: #0a58ca;">
        <div class="container d-flex align-items-center gap-3">
            <div class="img-header">
                <img src="{{ asset('img/laundry.jpg') }}" alt="LaundryKu Logo" width="80" class="rounded-3">
            </div>
            <div class="title-header">
                <h2 class="text-white m-0 fw-bold">LaundryKu</h2>
                <div class="opacity-75 text-white">Solusi anti malas mencuci</div>
            </div>
        </div>
    </div>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #052c65;">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <!-- Menu Kiri -->
                <div class="navbar-nav me-auto">
                    <a class="nav-link" href="{{ route('pages.home') }}">Halaman Utama</a>
                    <a class="nav-link" href="#">Cek Cucianmu</a>
                    <a class="nav-link" href="#">Tentang Kami</a>
                </div>

                <!-- Menu Kanan (Auth System) -->
                <div class="navbar-nav align-items-lg-center gap-2 mt-2 mt-lg-0">
                    @guest
                        {{-- Tampilan Kalau Belum Login --}}
                        <a href="{{ route('auth.login') }}" class="btn btn-outline-light btn-sm px-3">Login</a>
                        <a href="{{ route('auth.register') }}"
                            class="btn btn-warning btn-sm px-3 text-dark fw-bold">Register</a>
                    @endguest

                    @auth
                        {{-- Tampilan Kalau Sudah Login --}}
                        <div class="dropdown">
                            <button
                                class="btn btn-link text-white text-decoration-none dropdown-toggle d-flex align-items-center gap-2 p-0"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->full_name) }}&background=0D6EFD&color=fff"
                                    alt="User Avatar" width="32" height="32"
                                    class="rounded-circle border border-2 border-white">
                                <span>{{ Auth::user()->name }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('auth.logout') }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>
