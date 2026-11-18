<x-layouts.dashboard title="Pesanan">
    <h3 class="text-dark mt-3 mb-1">Daftar pesanan masuk</h3>
    <p class="text-muted small">Kelola data pesanan masuk LaundryKu</p>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="text-primary m-0 font-weight-bold">Data pesanan masuk</h6>
            <a href="{{ route('pesanan.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus fa-sm mr-1"></i> Buat Order
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Token Cucian</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Layanan</th>
                            <th>Alamat Pengantaran</th>
                            <th>Berat Cucian</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pesanans as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="font-weight-bold">{{ $item->token }}</span></td>
                                <td>{{ $item->customer?->full_name ?? '-' }}</td>
                                <td>{{ $item->service?->service_name ?? '-' }}</td>
                                <td style="max-width: 220px;">{{ $item->customer?->address ?? '-' }}</td>
                                <td class="text-nowrap">{{ $item->weight }} Kg</td>
                                <td class="text-nowrap">Rp {{ number_format($item->total_price, 0, ',', '.') }}</td>
                                <td>
                                    <span
                                        class="badge {{ $item->status === \App\Enum\OrderStatus::Diterima ? 'badge-info' : 'badge-warning' }} px-2 py-1">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td style="max-width: 200px;">{{ $item->note ?? '-' }}</td>
                                <td>
                                    <form action="{{ route('pesanan.updateStatus', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @method('PATCH')
                                        @csrf

                                        @if ($item->status === \App\Enum\OrderStatus::Diterima)
                                            <input type="hidden" name="status"
                                                value="{{ \App\Enum\OrderStatus::Diproses->value }}">
                                            <button type="submit" class="btn btn-sm btn-warning text-nowrap">Proses
                                                Cucian</button>
                                        @elseif ($item->status === \App\Enum\OrderStatus::Diproses)
                                            <input type="hidden" name="status"
                                                value="{{ \App\Enum\OrderStatus::Selesai->value }}">
                                            <button type="submit"
                                                class="btn btn-sm btn-success text-nowrap">Selesaikan</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-muted text-center py-4">Belum ada pesanan masuk</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mb-3">
                    {{ $pesanans->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
