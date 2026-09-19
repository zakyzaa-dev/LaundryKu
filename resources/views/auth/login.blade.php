<x-layouts.main title="Login">
    <div class="container my-5 d-flex justify-content-center align-items-center">
        <div class="col-md-5 col-lg-4">

            @if (session('success_register'))
                <div class="alert alert-success">
                    {{ session('success_register') }}
                </div>
            @endif

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-4">
                    <h4 class="card-title text-center fw-bold mb-4">Masuk Akun</h4>

                    <!-- Flash Alert jika ada error login -->
                    @if (session('error'))
                        <div class="alert alert-danger p-2 fs-6 mb-3">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('auth.login') }}" method="POST">
                        @csrf

                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" value="{{ old('username') }}"
                                placeholder="Masukkan username" required autofocus>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukkan password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Login</button>
                    </form>

                    <div class="text-center mt-3">
                        <small class="text-muted">Belum punya akun? <a href="{{ route('auth.register') }}"
                                class="text-decoration-none">Daftar sekarang</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.main>
