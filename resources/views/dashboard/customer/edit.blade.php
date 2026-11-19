<x-layouts.dashboard title="Edit Customer">
    <h3 class="mt-3 mb-1 text-dark">Edit Customer</h3>
    <p class="text-muted small">Mengedit data customer baru</p>

    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 text-primary fw-bold">Form Edit Customer</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('customer.update', $customer->username) }}" method="post">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Nama</label>
                            <input type="text" name="full_name" id="full_name"
                                class="form-control @error('full_name') is-invalid @enderror" placeholder="Hanni Pham"
                                minlength="1" maxlength="100" required
                                value="{{ old('full_name', $customer->full_name) }}">
                            @error('full_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username"
                                class="form-control @error('username') is-invalid @enderror" placeholder="phamuymuy"
                                minlength="1" maxlength="100" required
                                value="{{ old('username', $customer->username) }}">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor</label>
                            <input type="tel" name="phone" id="phone"
                                class="form-control @error('phone') is-invalid @enderror" placeholder="081252529545"
                                minlength="1" maxlength="20" required value="{{ old('phone', $customer->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Kosongkan jika tidak ingin mengubah password" minlength="1"
                                maxlength="100">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea name="address" id="" cols="30" rows="5"
                        class="form-control @error('address') is-invalid @enderror"
                        placeholder="Alamat lengkap customer yang digunakan untuk pengantaran" required>{{ old('address', $customer->address) }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-success mr-2">Simpan Perubahan</button>
                    <a href="{{ route('customer.index') }}" class="btn-secondary btn mr-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard>
