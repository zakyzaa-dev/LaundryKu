<x-layouts.main title="Register">
    <div class="container d-flex justify-content-center align-items-center py-5">
        <div class="col-md-6 col-lg-5">

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-4">
                    <h4 class="card-title text-center fw-bold mb-4">Buat Akun Baru</h4>

                    <form action="{{ route('auth.register') }}" method="POST">
                        @csrf

                        <!-- Hidden Role ID (Default: Customer / ID 2) -->
                        <input type="hidden" name="role_id" value="2">

                        <!-- Nama Lengkap (full_name) -->
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                id="full_name" name="full_name" value="{{ old('full_name') }}"
                                placeholder="Contoh: Budi Santoso" required>
                            @error('full_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" value="{{ old('username') }}" placeholder="budisantoso"
                                required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nomor HP (phone) -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor WhatsApp / HP</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                id="phone" name="phone" value="{{ old('phone') }}" placeholder="08123456789"
                                required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Alamat (address) -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3"
                                placeholder="Jl. Mawar No. 12..." required>{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Daftar Akun</button>
                    </form>

                    <div class="text-center mt-3">
                        <small class="text-muted">Sudah punya akun? <a href="{{ route('auth.login') }}"
                                class="text-decoration-none">Login di sini</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </x-layouts>
