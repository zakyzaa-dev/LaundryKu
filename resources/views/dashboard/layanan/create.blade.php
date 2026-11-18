<x-layouts.dashboard title="Tambah Anggota">
    <h3 class="mt-3 mb-1 text-dark">Tambah Layanan</h3>
    <p class="text-muted small">Menambahkan data layanan baru</p>

    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 text-primary fw-bold">Form Tambah layanan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('layanan.store') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="service_name" class="form-label">Nama Layanan</label>
                            <input type="text" name="service_name" id="service_name"
                                class="form-control @error('service_name') is-invalid @enderror"
                                placeholder="Contoh: Setrika uslug-uslug" minlength="1" maxlength="30" required
                                value="{{ old('service_name') }}" onkeyup="createSlug()">
                            @error('service_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug"
                                class="form-control @error('slug') is-invalid @enderror"
                                placeholder="setrika-uslug-uslug" minlength="1" maxlength="40" required readonly
                                value="{{ old('slug') }}">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="price_per_kg" class="form-label">Harga /Kg</label>
                            <input type="number" name="price_per_kg" id="price_per_kg" step="0.01"
                                class="form-control @error('price_per_kg') is-invalid @enderror"
                                placeholder="Contoh: 15000" minlength="1" required value="{{ old('price_per_kg') }}">
                            @error('price_per_kg')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="duration" class="form-label">Durasi</label>
                            <input type="text" name="duration" id="duration"
                                class="form-control @error('duration') is-invalid @enderror"
                                placeholder="Contoh: 2 hari" minlength="1" maxlength="100" required
                                value="{{ old('duration') }}">
                            @error('duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="" cols="30" rows="5"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Deskripsi dari layanan baru yang hendak ditambahkan"></textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Tambahkan Customer Baru</button>
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            function createSlug() {
                let serviceName = document.getElementById('service_name').value;
                document.getElementById('slug').value = generateSlug(serviceName);
            }

            function generateSlug(title) {
                return title.toString().toLowerCase()
                    .replace(/^-+/, '')
                    .replace(/-+$/, '')
                    .replace(/\s+/g, '-')
                    .replace(/\-\-+/g, '-')
                    .replace(/[^\w\-]+/g, '');
            }
        </script>
    @endpush
</x-layouts.dashboard>
