<x-layouts.main title="Order Service">
    <div class="container mt-4 mb-4">
        <div class="row g-4">

            {{-- INPUT SECTION --}}
            <div class="col-12 col-md-12 col-sm-12 col-lg-7">
                <div class="card">
                    <div class="card-body">
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
                    </div>
                </div>
            </div>

            {{-- NOTA SECTION --}}
            <div class="col-12 col-lg-5">
                @if (empty(session($detail)))
                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center flex-column py-3">
                                <h5 class="fw-bold text-muted">Belum ada perhitungan</h5>
                                <p class="opacity-75 small text-center">Input perhitungan anda terlebih dahulu sebelum
                                    memencet
                                    tombol
                                    simpan atau hitung</p>
                            </div>
                        </div>
                    </div>
                @else
                    @php
                        $detail = session('detail');
                    @endphp

                    {{-- TITLE NOTA --}}
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center text-muted fw-bold">Nota LaundryKu</h3>
                            <p class="text-center small text-muted">{{ date('Y') }}, Gawaran, Trimulyo</p>
                            <hr class="mb-3">

                            {{-- detail nota --}}
                            <div class="nama mb-1 d-flex justify-content-between">
                                <h5 class="fw-bold">Nama: </h5>
                                <p class="text-muted"></p>
                            </div>

                            <div class="alamat mb-1 d-flex justify-content-between">
                                <h5 class="fw-bold">Alamat: </h5>
                                <p class="text-muted"></p>
                            </div>

                            <div class="alamat mb-1 d-flex justify-content-between">
                                <h5 class="fw-bold">Token: </h5>
                                <p class="text-muted"></p>
                            </div>

                            <div class="layanan mb-1 d-flex justify-content-between">
                                <h5 class="fw-bold">Jenis Layanan: </h5>
                                <p class="text-muted"> </p>
                            </div>

                            <div class="harga mb-1 d-flex justify-content-between">
                                <h5 class="fw-bold">Harga: </h5>
                                <p class="text-muted"></p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>

    </x-layouts>
