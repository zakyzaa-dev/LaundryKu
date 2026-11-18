<x-layouts.dashboard title="Pesanan">
    <h3 class="text-dark mt-3 mb-1">Daftar pesanan menunggu</h3>
    <p class="text-muted small">Kelola data pesanan menunggu LaundryKu</p>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="text-primary m-0 font-weight-bold">Data pesanan menunggu</h6>
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
                                <td>{{ $item->weight }} Kg</td>
                                <td>Rp {{ number_format($item->total_price, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge badge-danger px-2 py-1">{{ $item->status }}</span>
                                </td>
                                <td style="max-width: 200px;">{{ $item->note ?? '-' }}</td>
                                <td>
                                    <form action="{{ route('pesanan.updateStatus', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @method('PATCH')
                                        @csrf
                                        <input type="hidden" name="status" value="Diterima">
                                        <button type="submit" class="btn btn-sm btn-success text-nowrap">Terima
                                            Pesanan</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-muted text-center py-4">Belum ada pesanan menunggu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
