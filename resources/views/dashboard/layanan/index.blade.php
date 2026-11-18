<x-layouts.dashboard title="Layanan">
    <h3 class="text-dark mt-3 mb-1">Daftar Layanan</h3>
    <p class="text-muted small">Kelola data layanan LaundryKu</p>

    @if (session('success'))
        <div class="alert alert-success">
            <b>{{ session('success') }}</b>
        </div>
    @endif

    <div class="card">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="text-primary m0 font-weight-bold">Data Layanan</h6>
            <a href="{{ route('layanan.create') }}" class="btn-primary btn btn-sm">
                <i class="fas fa-plus fa-sm"></i> Tambah Layanan
            </a>
        </div>
        <div class="card-body">
            <table class="table-striped table-bordered table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Layanan</th>
                        <th>Slug</th>
                        <th>Deskripsi layanan</th>
                        <th>Harga perkilo</th>
                        <th>Durasi</th>
                        <th>Ditambahkan Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->service_name ?? '-' }}</td>
                            <td>{{ $item->slug ?? '-' }}</td>
                            <td>{{ $item->description }}</td>
                            {{-- <td>{{ $item->weight }} Kg</td> --}}
                            <td>Rp. {{ number_format($item->price_per_kg, 0, ',', '.') }}</td>
                            <td>{{ $item->duration }}</td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="d-flex">
                                    {{-- EDIT --}}
                                    <a href="" class="btn-warning btn-sm btn mr-2">Edit</a>

                                    {{-- DELETE --}}
                                    <form action="{{ route('layanan.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger btn-sm btn mr-2"
                                            onclick="return confirm('Yakin ingin menghapus anggota {{ $item->service_name }}')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-muted text-center">Belum ada pesanan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>
