<x-layouts.dashboard title="Tambah Anggota">
    <h3 class="mt-3 mb-1 text-dark">Tambah Customer</h3>
    <p class="text-muted small">Menambahkan data customer baru</p>

    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 text-primary fw-bold">Form Tambah Customer</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('customer.store') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Nama</label>
                            <input type="text" name="full_name" id="full_name"
                                class="form-control @error('full_name') is-invalid @enderror" placeholder="Hanni Pham"
                                minlength="1" maxlength="100" required value="{{ old('full_name') }}">
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
                                minlength="1" maxlength="100" required value="{{ old('username') }}">
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
                            <input type="number" name="phone" id="phone"
                                class="form-control @error('phone') is-invalid @enderror" placeholder="081252529545"
                                minlength="1" maxlength="20" required value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="phamuymuy@6102004" minlength="1" maxlength="100" required
                                value="{{ old('password') }}">
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
                        placeholder="Alamat lengkap customer yang digunakan untuk pengantaran"></textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Tambahkan Customer Baru</button>
            </form>
        </div>
    </div>
</x-layouts.dashboard>
