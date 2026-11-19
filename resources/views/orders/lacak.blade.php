<x-layouts.app title="Lacak Cucian">

    {{-- HERO SECTION (Senada dengan halaman Home) --}}
    <div class="text-white py-5" style="background: linear-gradient(90deg, #2193b0 0%, #6dd5ed 100%)">
        <div class="container text-center py-4">
            <h1 class="fw-bold display-5">Lacak Status Cucianmu</h1>
            <p class="lead mb-4">Masukkan kode token resi yang kamu dapatkan saat memesan untuk memantau progres cucian
                secara real-time.</p>

            {{-- FORM PENCARIAN TOKEN --}}
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <form action="{{ route('orders.lacak') }}" method="GET"
                        class="bg-white p-2 rounded-3 shadow-sm d-flex gap-2">
                        <input type="text" name="token" class="form-control border-0 shadow-none form-control-lg"
                            placeholder="Contoh: LNY-2026-XXXXXXXXXXX" value="{{ request('token') }}" required>
                        <button type="submit" class="btn btn-primary btn-lg px-4 fw-bold">Lacak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- SVG DIVIDER (Sama dengan Home) --}}
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

    {{-- HASIL PELACAKAN --}}
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">

                @if (request()->filled('token'))
                    @if ($order)
                        {{-- CARD DETAIL RESI --}}
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="text-muted small d-block">Kode Token Resi</span>
                                    <h5 class="fw-bold text-primary mb-0">{{ $order->token }}</h5>
                                </div>
                                <span class="badge bg-info text-dark fs-6 px-3 py-2">
                                    {{ $order->status?->label() ?? $order->status }}
                                </span>
                            </div>

                            <div class="card-body">
                                <div class="row text-center my-4 g-2">
                                    @foreach (\App\Enum\OrderStatus::stepperCases() as $step)
                                        @php $isPassed = $step->isPassed($order->status) @endphp
                                        <div class="col">
                                            <div class="mx-auto mb-2 rounded-circle d-flex align-items-center justify-content-center fw-bold {{ $isPassed ? 'bg-primary text-white shadow-sm' : 'bg-light text-muted border' }}"
                                                style="width: 42px; height: 42px;">
                                                {{ $loop->iteration }}
                                            </div>
                                            <p class="small mb-0 {{ $isPassed ? 'fw-bold text-dark' : 'text-muted' }}">
                                                {{ $step->label() }}</p>
                                        </div>
                                    @endforeach
                                </div>

                                <hr class="my-4">

                                {{-- RINCIAN PESANAN --}}
                                <div class="row g-3">
                                    <div class="col-6 col-md-4">
                                        <small class="text-muted d-block">Nama Pelanggan</small>
                                        <span class="fw-bold">{{ $order->customer?->full_name ?? '-' }}</span>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <small class="text-muted d-block">Jenis Layanan</small>
                                        <span class="fw-bold">{{ $order->service?->service_name ?? '-' }}</span>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <small class="text-muted d-block">Berat Cucian</small>
                                        <span class="fw-bold">{{ $order->weight }} Kg</span>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <small class="text-muted d-block">Total Biaya</small>
                                        <span class="fw-bold text-primary">Rp
                                            {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <small class="text-muted d-block">Catatan</small>
                                        <span>{{ $order->note ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        {{-- ALERT JIKA TOKEN TIDAK DITEMUKAN --}}
                        <div class="alert alert-warning text-center p-4 shadow-sm border-0">
                            <h5 class="fw-bold mb-2">Token Tidak Ditemukan!</h5>
                            <p class="text-muted mb-0">Pastikan kode token resi
                                <strong>"{{ request('token') }}"</strong> sudah sesuai dengan nota pemesanan kamu.
                            </p>
                        </div>
                    @endif
                @else
                    {{-- TAMPILAN AWAL SEBELUM CARI --}}
                    <div class="text-center text-muted py-4">
                        <p class="mb-0">Silakan ketik kode token di atas untuk melihat detail dan progres cucian.</p>
                    </div>
                @endif

            </div>
        </div>
    </div>

</x-layouts.app>
