<x-layouts.dashboard title="Pesanan">
    <h3 class="text-dark mt-3 mb-1">Daftar Customer</h3>
    <p class="text-muted small">Kelola data customer LaundryKu</p>

    @if (session('success'))
        <div class="alert alert-success">
            <b>{{ session('success') }}</b>
        </div>
    @endif

    <div class="card">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="text-primary m0 font-weight-bold">Data customer</h6>
            <a href="{{ route('customer.create') }}" class="btn-primary btn btn-sm">
                <i class="fas fa-plus fa-sm"></i> Tambah Customer
            </a>
        </div>
        <div class="card-body">
            <table class="table-striped table-bordered table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Customer</th>
                        <th>Username</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->full_name ?? '-' }}</td>
                            <td>{{ $item->username ?? '-' }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-muted text-center">Belum ada customer</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>
