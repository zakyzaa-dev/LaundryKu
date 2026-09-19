<x-layouts.main title="Order Service">

    {{-- CEK ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-4 mb-4">
        <div class="row g-4">

            {{-- INPUT SECTION --}}
            <div class="col-12 col-md-12 col-sm-12 col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('orders.receipt') }}" method="post">
                            @csrf
                            <div class="d-flex gap-3 mb-3">

                                {{-- BERAT --}}
                                <div class="berat flex-fill">
                                    <label for="weight" class="form-label">Estimasi Berat</label>
                                    <input type="number" name="weight" id="weight" class="form-control"
                                        placeholder="3 kg" required>
                                </div>

                                {{-- SERVICE --}}
                                <div class="service flex-fill   ">
                                    <label for="service" class="form-label">Layanan</label>
                                    <select name="service" id="service" class="form-select">
                                        <option value="" disabled selected>Pilih Layanan</option>
                                        @forelse ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                        @empty
                                            <option value="" disabled selected>Belum ada data layanan!</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            @auth
                                <button class="btn btn-primary w-100">Order!</button>
                            @endauth

                            @guest
                                <button class="btn btn-primary w-100" disabled>Login terlebih dahulu!</button>
                            @endguest
                        </form>

                    </div>
                </div>
            </div>

            {{-- NOTA SECTION --}}
            <div class="col-12 col-md-12 col-sm-12 col-lg-5">
                @if (empty(session('receiptDetail')))
                    <div class="card border-0 shadow-sm bg-light">
                        <div class="card-body text-center py-5">
                            <div class="mb-3">
                                <i class="bi bi-calculator text-secondary display-4"></i>
                            </div>
                            <h6 class="fw-bold text-dark mb-1">Belum Ada Perhitungan</h6>
                            <p class="text-muted small mb-0 px-3">
                                Input data pesanan terlebih dahulu, lalu klik tombol hitung untuk melihat rincian nota
                                di sini.
                            </p>
                        </div>
                    </div>
                @else
                    @php
                        $detail = session('receiptDetail');
                    @endphp

                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            {{-- HEADER NOTA --}}
                            <div class="text-center mb-3">
                                <div class="badge bg-primary-subtle text-primary fw-bold mb-2 px-3 py-2 rounded-pill">
                                    STRUK PEMBAYARAN
                                </div>
                                <h4 class="fw-bold text-dark mb-0">LaundryKu</h4>
                                <p class="text-muted small mb-0">Gawaran, Trimulyo &bull; {{ date('d M Y') }}</p>
                            </div>

                            {{-- GARIS PEMBATAS RESI --}}
                            <hr style="border-top: 2px dashed #ccc;" class="my-3">

                            {{-- RINCIAN PELANGGAN & PESANAN --}}
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted small">Nama Pelanggan</span>
                                <span class="fw-semibold text-dark">{{ $detail['nama'] }}</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="text-muted small">Alamat</span>
                                <span class="fw-semibold text-dark text-end ms-3"
                                    style="max-width: 60%;">{{ $detail['alamat'] }}</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted small">Jenis Layanan</span>
                                <span class="fw-semibold text-dark">{{ $detail['jenis_layanan'] }}</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted small">Berat Total</span>
                                <span class="fw-semibold text-dark">{{ $detail['berat'] }} Kg</span>
                            </div>

                            {{-- TOKEN / KODE RESI --}}
                            <div class="d-flex justify-content-between align-items-center my-3 p-2 bg-light rounded">
                                <span class="text-muted small fw-bold">TOKEN RESI</span>
                                <span class="badge bg-dark fs-6 font-monospace px-3 py-2">{{ $detail['token'] }}</span>
                            </div>

                            <hr style="border-top: 2px dashed #ccc;" class="my-3">

                            {{-- TOTAL HARGA --}}
                            <div class="p-3 bg-primary bg-opacity-10 rounded-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-primary">Total Bayar</span>
                                    <h4 class="fw-bold text-primary mb-0">Rp
                                        {{ number_format($detail['harga'], 0, ',', '.') }}</h4>
                                </div>
                            </div>

                            {{-- FOOTER STRUCT --}}
                            <div class="text-center mt-4">
                                <p class="text-muted extra-small mb-0" style="font-size: 0.75rem;">
                                    Simpan token resi untuk melacak status laundry Anda secara online. Terima kasih!
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>

    </x-layouts>
