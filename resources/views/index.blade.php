@extends('layouts.main')
@section('content')
    {{-- HERO SECTION --}}
    <div class="text-white" style="background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%)">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center py-5 g-4">
                <div class="col-lg-7">
                    <h1 class="fw-bold display-5">Laundry Antar Jemput, Kelar Secepat Kilat</h1>
                    <p class="lead">Males nyuci? Mending ke <b class="fw-bold"><a href="/"
                                class="text-white text-decoration-none">LaundryKu</a></b>. Solusi
                        buat kamu yang mager
                        nyuci sendiri. Dijamin wangi, cepat dan harga bersahabat!</p>
                    <div class="d-flex gap-2">
                        <a href="#testimoni" class="btn btn-light btn-lg">Cek Testimoni!</a>
                        <a href="#testimoni" class="btn btn-outline-warning btn-lg">Tanya Admin!</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center">
                    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('img/laundryku-washing-machine.png') }}" alt="wahing machine ceunahh"
                                    class="img-fluid" style="max-height: 350px; object-fit:contain;">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/laundryku-orang.png') }}" alt="wahing machine ceunahh"
                                    class="img-fluid" style="max-height: 350px; object-fit:contain;">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/laundryku-kurir.png') }}" alt="wahing machine ceunahh"
                                    class="img-fluid" style="max-height: 350px; object-fit:contain;">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    {{-- SVG DIVIDER --}}
    <div class="custom-shape-divider-top-1789566759">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <defs>
                <linearGradient id="heroGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#2193b0" />
                    <stop offset="100%" stop-color="#6dd5ed" />
                </linearGradient>
            </defs>
            <!-- Layer dasar solid, tanpa opacity, biar warna gak washed out -->
            <path
                d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                fill="url(#heroGradient)"></path>
            <!-- Layer tekstur di atas, opacity tetap biar ada efek gelombang -->
            <path
                d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                opacity=".5" fill="url(#heroGradient)"></path>
            <path
                d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                opacity=".25" fill="url(#heroGradient)"></path>
        </svg>
    </div>

    {{-- STATS LAUNDRYKU --}}
    <div class="container">
        <div class="row text-center py-5 g-4">
            <div class="col-12 col-lg-4">
                <h2 class="text-primary fw-bold mb-0">10rb+</h2>
                <p class="mt-0 text-muted">Pesanan/bulan</p>
            </div>
            <div class="col-12 col-lg-4">
                <h2 class="text-primary fw-bold mb-0">4.8</h2>
                <p class="mt-0 text-muted">Rating pelanggan</p>
            </div>
            <div class="col-12 col-lg-4">
                <h2 class="text-primary fw-bold mb-0">100%</h2>
                <p class="mt-0 text-muted">Tepat waktu</p>
            </div>
        </div>
    </div>

    {{-- CARA KERJA LAUNDRYKU --}}
    <div class="bg-light py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Cara Kerja Kita</h2>
            <div class="row g-4 text-center">

                {{-- CARA KERJA 1 --}}
                <div class="col-12 col-lg-3">

                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="work-step text-white fw-bold rounded-circle mx-auto mb-3">1</div>
                            <h5 class="fw-bold">Pesan</h5>
                            <p class="text-muted">Pilih layanan dan isi info laundry</p>
                        </div>
                    </div>
                </div>

                {{-- CARA KERJA 2 --}}
                <div class="col-12 col-lg-3">

                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="work-step text-white fw-bold rounded-circle mx-auto mb-3">2</div>
                            <h5 class="fw-bold">Dijemput</h5>
                            <p class="text-muted">Duduk manis dirumah, pakaian kotor otw dijemput</p>
                        </div>
                    </div>
                </div>

                {{-- CARA KERJA 3 --}}
                <div class="col-12 col-lg-3">

                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="work-step text-white fw-bold rounded-circle mx-auto mb-3">3</div>
                            <h5 class="fw-bold">Dicuci</h5>
                            <p class="text-muted">Pakaian langsung diproses sesuai pilihan layananmu</p>
                        </div>
                    </div>
                </div>

                {{-- CARA KERJA 4 --}}
                <div class="col-12 col-lg-3">

                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="work-step text-white fw-bold rounded-circle mx-auto mb-3">4</div>
                            <h5 class="fw-bold">Diantar</h5>
                            <p class="text-muted">Cucian bersih siap diantar ke depan pintumu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
