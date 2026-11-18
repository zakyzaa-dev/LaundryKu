<x-layouts.dashboard title="Tambah Orderan">
    <h3 class="mt-3 mb-1 text-dark">Tambah Orderan</h3>
    <p class="text-muted small">Menambahkan data orderan baru</p>

    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 text-primary fw-bold">Form Tambah Orderan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('pesanan.store') }}" method="post">
                @csrf

                <div class="row">
                    {{-- DROPDOWN CUSTOMER --}}
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Data Customer</label>
                            <select name="customer_id" class="custom-select @error('customer_id') is-invalid @enderror"
                                required>
                                <option value="" selected disabled><--Pilih Data Customer--></option>
                                @forelse ($customers as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('customer_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->full_name ?? 'Tidak dikenal' }}
                                    </option>
                                @empty
                                    <option value="" disabled>Belum ada data customer!</option>
                                @endforelse
                            </select>
                            @error('customer_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- DROPDOWN LAYANAN (Bawa attribute data-price) --}}
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="service_id" class="form-label">Data Layanan</label>
                            <select name="service_id" id="service_id"
                                class="custom-select @error('service_id') is-invalid @enderror" required>
                                <option value="" selected disabled data-price="0"><--Pilih Data Layanan-->
                                </option>
                                @forelse ($services as $item)
                                    {{-- Asumsi di tabel services ada kolom 'price' --}}
                                    <option value="{{ $item->id }}" data-price="{{ $item->price_per_kg ?? 0 }}"
                                        {{ old('service_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->service_name ?? 'Tidak dikenal' }} (Rp
                                        {{ number_format($item->price_per_kg ?? 0, 0, ',', '.') }}/Kg)
                                    </option>
                                @empty
                                    <option value="" disabled>Belum ada data layanan!</option>
                                @endforelse
                            </select>
                            @error('service_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- TOKEN DARI BACKEND (Readonly biar nggak bisa diubah sembarangan) --}}
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="token" class="form-label">Token / Kode Order</label>
                            <input type="text" name="token" id="token"
                                class="form-control @error('token') is-invalid @enderror" readonly required
                                value="{{ old('token', $token) }}">
                            @error('token')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- WEIGHT (BERAT) --}}
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="weight" class="form-label">Berat (Kg)</label>
                            <input type="number" step="0.01" name="weight" id="weight"
                                class="form-control @error('weight') is-invalid @enderror" placeholder="Contoh: 1.50"
                                min="0.10" max="99.99" required value="{{ old('weight') }}">
                            @error('weight')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- TOTAL PRICE (Otomatis Terhitung Realtime) --}}
                    <div class="col-md-12 col-12">
                        <div class="mb-3">
                            <label for="total_price" class="form-label">Total Harga (Rp)</label>
                            <input type="number" step="0.01" name="total_price" id="total_price"
                                class="form-control @error('total_price') is-invalid @enderror"
                                placeholder="Otomatis terhitung" readonly required value="{{ old('total_price') }}">
                            @error('total_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- NOTE (TEXTAREA) --}}
                <div class="mb-3">
                    <label for="note" class="form-label">Catatan (Note)</label>
                    <textarea name="note" id="note" cols="30" rows="4"
                        class="form-control @error('note') is-invalid @enderror"
                        placeholder="Tambahkan catatan khusus untuk orderan ini (opsional)">{{ old('note') }}</textarea>
                    @error('note')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan Orderan Baru</button>
            </form>
        </div>
    </div>

    {{-- JAVASCRIPT BUAT HITUNG HARGA REALTIME --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const serviceSelect = document.getElementById('service_id');
                const weightInput = document.getElementById('weight');
                const totalPriceInput = document.getElementById('total_price');

                function calculateTotal() {
                    // Ambil harga dari atribut data-price option yang dipilih
                    const selectedOption = serviceSelect.options[serviceSelect.selectedIndex];
                    const pricePerKg = parseFloat(selectedOption.getAttribute('data-price')) || 0;
                    const weight = parseFloat(weightInput.value) || 0;

                    // Hitung total harga
                    const total = pricePerKg * weight;

                    // Masukkan ke input total_price (dibuat 2 angka di belakang koma)
                    totalPriceInput.value = total.toFixed(2);
                }

                // Jalankan fungsi saat layanan diganti atau berat diketik
                serviceSelect.addEventListener('change', calculateTotal);
                weightInput.addEventListener('input', calculateTotal);
            });
        </script>
    @endpush
</x-layouts.dashboard>
