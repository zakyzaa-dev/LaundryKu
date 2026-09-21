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
                                    <select name="service" id="service" class="form-select" required>
                                        <option value="" disabled selected>Pilih Layanan</option>
                                        @forelse ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->service_name }} - Rp
                                                {{ number_format($service->price_per_kg, 0, ',', '.') }} /kg</option>
                                        @empty
                                            <option value="" disabled selected>Belum ada data layanan!</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            @auth
                                <button
                                    class="btn btn-primary w-100">{{ session('receiptDetail') ? 'Hitung ulang nota' : 'Hitung Nota' }}</button>
                            @endauth

                            @guest
                                <a class="btn btn-primary w-100" href="{{ route('auth.login') }}">Login terlebih dahulu!</a>
                            @endguest
                        </form>
                    </div>
                </div>
                <div class="d-flex mt-3 justify-content-between bg-light align-items-center p-2 rounded">
                    <span class="text-muted small fw-bold">TOKEN RESI</span>
                    <span class="text-white fw-bold badge bg-dark fs-6 font-monospace px-3 py-2">TESTING
                        KENAPA BANF</span>
                </div>
            </div>

            {{-- NOTA SECTION --}}
            <div class="col-12 col-md-12 col-sm-12 col-lg-5">
                @if (empty(session('receiptDetail')))
                    <x-invoice.invoice-blank></x-invoice>
                    @else
                        <x-invoice.invoice-detail :detail="session('receiptDetail')"></x-invoice>
                            <form action="#" method="post">
                                @csrf
                                <button type="submit" class="mt-3 btn-primary btn w-100">Konfirmasi order</button>
                            </form>
                @endif
            </div>

        </div>
    </div>

    </x-layouts>
