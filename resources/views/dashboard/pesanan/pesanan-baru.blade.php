<x-layouts.dashboard title="Pesanan">
    <h3 class="text-dark mt-3 mb-1">Daftar pesanan masuk</h3>
    <p class="text-muted small">Kelola data pesanan masuk LaundryKu</p>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="text-primary m0 font-weight-bold">Data pesanan masuk</h6>
            <a href="" class="btn-primary btn btn-sm">
                <i class="fas fa-plus fa-sm"></i> Tambah Peminjaman
            </a>
        </div>
        <div class="card-body">
            <table class="table-striped table-bordered table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Layanan</th>
                        <th>Alamat Pengantaran</th>
                        <th>Token Cucian</th>
                        <th>Berat Cucian</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        <th>Aksi</th> <!-- Tambahan Kolom Aksi -->
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pesanans as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->customer?->full_name ?? '-' }}</td>
                            <td>{{ $item->service?->service_name ?? '-' }}</td>
                            <td>{{ $item->customer?->address ?? '-' }}</td>
                            <td>{{ $item->token }}</td>
                            <td>{{ $item->weight }} Kg</td>
                            <td>Rp. {{ number_format($item->total_price, 0, ',', '.') }}</td>
                            <td>
                                <h5>
                                    <span
                                        class="badge {{ $item->status === \App\Enum\OrderStatus::Diterima ? 'badge-info' : 'badge-warning' }}">
                                        {{ $item->status }}
                                    </span>
                                </h5>
                            </td>
                            <td style="max-width: 200px;">{{ $item->note ?? '-' }}</td>

                            {{-- TOMBOL / FORM UPDATE STATUS DINAMIS --}}
                            <td>
                                <form action="{{ route('pesanan.updateStatus', $item->id) }}" method="post"
                                    class="d-inline">
                                    @method('PATCH')
                                    @csrf

                                    @if ($item->status === \App\Enum\OrderStatus::Diterima)
                                        {{-- Jika status masih Diterima, tombol untuk lanjut ke Diproses --}}
                                        <input type="hidden" name="status"
                                            value="{{ \App\Enum\OrderStatus::Diproses->value }}">
                                        <button type="submit" class="btn btn-sm btn-warning">Proses Cucian</button>
                                    @elseif ($item->status === \App\Enum\OrderStatus::Diproses)
                                        {{-- Jika sedang Diproses, tombol untuk lanjut ke Selesai (Nanti otomatis pindah ke page cucian selesai) --}}
                                        <input type="hidden" name="status"
                                            value="{{ \App\Enum\OrderStatus::Selesai->value }}">
                                        <button type="submit" class="btn btn-sm btn-success">Selesaikan</button>
                                    @endif
                                </form>
                            </td>
                            {{-- END AKSI --}}

                        </tr>
                    @empty
                        <tr>
                            {{-- Ubah colspan jadi 9 karena ada penambahan kolom Aksi --}}
                            <td colspan="9" class="text-muted text-center">Belum ada pesanan masuk</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>
