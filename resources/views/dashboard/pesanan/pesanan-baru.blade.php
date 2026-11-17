<x-layouts.dashboard title="Pesanan">
    <h3 class="text-dark mt-3 mb-1">Daftar pesanan masuk</h3>
    <p class="text-muted small">Kelola data pesanan masuk LaundryKu</p>

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
                        <th>Token Cucian</th>
                        <th>Berat Cucian</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pesanans as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->customer?->full_name ?? '-' }}</td>
                            <td>{{ $item->service?->service_name ?? '-' }}</td>
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
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-muted text-center">Belum ada pesanan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>
