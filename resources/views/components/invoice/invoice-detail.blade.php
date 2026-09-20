@props(['detail'])

<div class="card shadow-sm">
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
            <span class="fw-semibold text-dark text-end ms-3" style="max-width: 60%;">{{ $detail['alamat'] }}</span>
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
