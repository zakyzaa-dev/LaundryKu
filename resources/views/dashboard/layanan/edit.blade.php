<x-layouts.dashboard title="Edit Layanan">
    <h3 class="mt-3 mb-1 text-dark">Edit Layanan</h3>
    <p class="text-muted small">Mengubah data layanan yang sudah ada</p>

    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 text-primary fw-bold">Form Edit Layanan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('layanan.update', $service->slug) }}" method="post">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="service_name" class="form-label">Nama Layanan</label>
                            <input type="text" name="service_name" id="service_name"
                                class="form-control @error('service_name') is-invalid @enderror"
                                placeholder="Contoh: Setrika uslug-uslug" minlength="1" maxlength="30" required
                                value="{{ old('service_name', $service->service_name) }}" onkeyup="createSlug()">
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
                                placeholder="Contoh: setrika-uslug-uslug" minlength="1" maxlength="40" required
                                readonly value="{{ old('slug', $service->slug) }}">
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
                            <input type="number" name="price_per_kg" id="price_per_kg" step="0.01" min="0"
                                max="99999999.99" class="form-control @error('price_per_kg') is-invalid @enderror"
                                placeholder="Contoh: 15000" required
                                value="{{ old('price_per_kg', $service->price_per_kg) }}">
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
                                placeholder="Contoh: 2 hari" minlength="1" maxlength="20" required
                                value="{{ old('duration', $service->duration) }}">
                            @error('duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" cols="30" rows="5" maxlength="255" required
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Deskripsi dari layanan yang hendak diubah">{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex">
                    <button type="submit" class="btn mr-2 btn-success">Simpan Perubahan</button>
                    <a href="{{ route('layanan.index') }}" class="btn mr-2 btn-secondary">Batal</a>
                </div>
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
