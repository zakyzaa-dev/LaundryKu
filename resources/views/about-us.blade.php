<x-layouts.app title="Tentang Kami">

    <div class="text-white" style="background: linear-gradient(90deg, #2193b0 0%, #6dd5ed 100%)">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center py-5 g-4">
                <div class="col-lg-7">
                    <span class="badge bg-white text-primary fw-bold px-3 py-2 mb-3 rounded-pill">Tentang
                        LaundryKu</span>
                    <h1 class="fw-bold display-5">Bukan Sekadar Jasa Cuci Baju Biasa</h1>
                    <p class="lead mb-0">Berawal dari keresahan anak kos dan pekerja yang sering kehabisan waktu buat
                        urusan cucian, LaundryKu hadir dengan standar kebersihan tinggi, transparansi berat, dan layanan
                        antar-jemput tanpa ribet.</p>
                </div>
                <div class="col-lg-5 text-center">
                    <img src="{{ asset('img/laundryku-orang.png') }}" alt="Tim LaundryKu" class="img-fluid"
                        style="max-height: 320px; object-fit: contain;">
                </div>
            </div>
        </div>
    </div>

    <div class="custom-shape-divider-top-1789566759">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <defs>
                <linearGradient id="heroGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#2193b0" />
                    <stop offset="100%" stop-color="#6dd5ed" />
                </linearGradient>
            </defs>
            <path
                d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                fill="url(#heroGradient)"></path>
            <path
                d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                opacity=".5" fill="url(#heroGradient)"></path>
            <path
                d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                opacity=".25" fill="url(#heroGradient)"></path>
        </svg>
    </div>

    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <img src="{{ asset('img/laundryku-washing-machine.png') }}" alt="Mesin Cuci LaundryKu"
                    class="img-fluid rounded-4 shadow-sm bg-light p-4 w-100"
                    style="max-height: 360px; object-fit: contain;">
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold mb-3">Kenapa Kami Bikin LaundryKu?</h2>
                <p class="text-muted">Banyak tempat laundry yang bikin was-was: baju ketukar, timbangan tidak
                    transparan, sampai status cucian yang tidak jelas kapan selesainya.</p>
                <p class="text-muted mb-4">Di <strong>LaundryKu</strong>, kami mengubah sistem konvensional jadi lebih
                    terukur. Setiap pesanan punya kode token pelacakan sendiri, pencucian dipisah per pelanggan (tidak
                    dicampur), dan timbangan dihitung secara transparan.</p>

                <div class="row g-3">
                    <div class="col-6">
                        <div class="border-start border-primary border-4 ps-3">
                            <h5 class="fw-bold mb-0">1 Mesin 1 Pelanggan</h5>
                            <small class="text-muted">Baju aman, tidak dicampur</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="border-start border-primary border-4 ps-3">
                            <h5 class="fw-bold mb-0">Lacak Real-Time</h5>
                            <small class="text-muted">Pantau progres lewat token</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Standar Kerja Kami</h2>
                <p class="text-muted">Tiga hal yang selalu kami jaga di setiap keranjang cucianmu.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 p-3">
                        <div class="card-body">
                            <div class="work-step text-white fw-bold rounded-circle mb-3">01</div>
                            <h5 class="fw-bold">Deterjen & Parfum Ramah Serat</h5>
                            <p class="text-muted mb-0">Kami tidak asal pakai pewangi murahan yang bikin baju cepat pudar
                                atau apek saat disimpan lama di lemari.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 p-3">
                        <div class="card-body">
                            <div class="work-step text-white fw-bold rounded-circle mb-3">02</div>
                            <h5 class="fw-bold">Timbangan Digital Jujur</h5>
                            <p class="text-muted mb-0">Estimasi awal di website akan diverifikasi ulang di timbangan
                                digital toko. Kamu hanya bayar sesuai berat aktual.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 p-3">
                        <div class="card-body">
                            <div class="work-step text-white fw-bold rounded-circle mb-3">03</div>
                            <h5 class="fw-bold">Antar-Jemput Tepat Waktu</h5>
                            <p class="text-muted mb-0">Kurir internal kami siap jemput dan antar kembali sesuai jadwal
                                paket yang kamu pilih—baik Reguler maupun Express.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="card border-0 shadow-sm">
            <div class="row g-0 align-items-center">
                <div class="col-lg-7 p-4 p-lg-5">
                    <h3 class="fw-bold mb-3">Mampir ke Outlet atau Pesan dari Rumah</h3>
                    <p class="text-muted mb-4">Mau drop-off langsung atau minta dijemput kurir? Tim kami siap melayani
                        setiap hari.</p>

                    <ul class="list-unstyled text-muted mb-4">
                        <li class="mb-2"><strong>Jam Operasional:</strong> Senin – Minggu (07.00 – 21.00 WIB)</li>
                        <li class="mb-2"><strong>Layanan Cepat:</strong> Express Selesai di Hari yang Sama</li>
                        <li><strong>Kontak Admin:</strong> Respon cepat via WhatsApp</li>
                    </ul>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('orders.create') }}" class="btn btn-primary btn-lg">Pesan Sekarang</a>
                        <a href="https://wa.me/{{ env('ADMIN_WHATSAPP') }}" target="_blank"
                            class="btn btn-outline-primary btn-lg">Hubungi WhatsApp</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center p-4"
                    style="background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%); border-radius: 10px">
                    <img src="{{ asset('img/laundryku-kurir.png') }}" alt="Kurir LaundryKu" class="img-fluid"
                        style="max-height: 280px; object-fit: contain;">
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
