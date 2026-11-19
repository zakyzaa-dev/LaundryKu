<x-layouts.app title="Tentang Kami">
    {{-- ABOUT US LAUNDRYKU --}}
    <div id="about-us" class="py-5">
        <div class="container">
            <div class="row align-items-center g-4 g-lg-5">

                {{-- ILUSTRASI / VISUAL --}}
                <div class="col-12 col-lg-5 text-center">
                    <div class="p-4 rounded-4 shadow-sm border bg-white">
                        <img src="{{ asset('img/laundryku-orang.png') }}" alt="Tentang LaundryKu" class="img-fluid"
                            style="max-height: 290px; object-fit: contain;">
                    </div>
                </div>

                {{-- DESKRIPSI & NILAI UTAMA --}}
                <div class="col-12 col-lg-7">
                    <span class="badge rounded-pill px-3 py-2 mb-3 text-white"
                        style="background: linear-gradient(90deg, #2193b0 0%, #6dd5ed 100%);">
                        Tentang Kami
                    </span>

                    <h2 class="fw-bold mb-3">Kenalan Lebih Dekat dengan <span class="text-primary">LaundryKu</span></h2>

                    <p class="text-muted lh-lg mb-4">
                        LaundryKu hadir sebagai solusi praktis untuk menjawab kebutuhan masyarakat yang memiliki
                        mobilitas
                        tinggi. Melalui layanan cuci dan perawatan pakaian berkualitas, LaundryKu berkomitmen memberikan
                        kenyamanan dan kebersihan maksimal. Dengan mengedepankan ketepatan waktu dan kemudahan
                        pemesanan,
                        project ini dirancang untuk menjadi mitra terpercaya dalam merawat pakaian Anda setiap hari.
                    </p>

                    <div class="row g-3 mb-4">
                        <div class="col-12 col-sm-4">
                            <div class="p-3 rounded-3 bg-light h-100 border-start border-4 border-primary">
                                <h6 class="fw-bold mb-1">Tepat Waktu</h6>
                                <p class="text-muted small mb-0">Jadwal jemput & antar yang terukur dan bisa diandalkan.
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="p-3 rounded-3 bg-light h-100 border-start border-4 border-primary">
                                <h6 class="fw-bold mb-1">Mudah Dipesan</h6>
                                <p class="text-muted small mb-0">Pemesanan praktis tanpa antre dan tanpa ribet.</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="p-3 rounded-3 bg-light h-100 border-start border-4 border-primary">
                                <h6 class="fw-bold mb-1">Bersih & Wangi</h6>
                                <p class="text-muted small mb-0">Perawatan pakaian maksimal untuk aktivitas harianmu.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('orders.create') }}" class="btn btn-primary px-4">Pesan Sekarang</a>
                        <a href="https://wa.me/{{ env('ADMIN_WHATSAPP') }}" target="_blank"
                            class="btn btn-outline-primary px-4">Hubungi Kami</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-layouts.app>
