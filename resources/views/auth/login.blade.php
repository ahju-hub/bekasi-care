@extends('layout')

@section('title', 'Login | Bekasi Care')

@section('content')
<section class="auth-section">
    <div class="auth-shell">
        <div class="auth-copy section-card section-card--dark">
            <span class="eyebrow eyebrow--light">Akses sistem</span>
            <h1>Masuk untuk mengelola laporan atau melanjutkan aktivitas pelaporan.</h1>
            <p>
                Admin dapat memantau seluruh laporan warga dari dashboard. Pengguna umum dapat masuk untuk menyimpan identitas dan melanjutkan akses ke sistem dengan lebih nyaman.
            </p>

            <div class="auth-points">
                <div class="info-chip info-chip--dark">
                    <strong>Akses admin</strong>
                    <p>Pantau laporan terbaru, buka detail kejadian, dan rapikan data pengaduan.</p>
                </div>
                <div class="info-chip info-chip--dark">
                    <strong>Satu akun</strong>
                    <p>Gunakan akun yang sama untuk login kembali tanpa mengulangi proses registrasi.</p>
                </div>
            </div>
        </div>

        <div class="section-card auth-card">
            <div class="section-heading section-heading--stacked">
                <div>
                    <span class="eyebrow">Login akun</span>
                    <h2>Masuk ke Bekasi Care</h2>
                </div>
                <p>Gunakan email dan password yang sudah terdaftar.</p>
            </div>

            @if (session('success'))
                <div class="alert-box alert-box--success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert-box alert-box--danger">
                    <ul class="error-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/login" method="POST" class="report-form">
                @csrf

                <label class="form-field">
                    <span>Email</span>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
                </label>

                <label class="form-field">
                    <span>Password</span>
                    <input type="password" name="password" placeholder="Masukkan password" required>
                </label>

                <div class="login-options">
                    <label class="checkbox-field">
                        <input type="checkbox" name="remember" value="1">
                        <span>Ingat sesi login saya</span>
                    </label>
                    <a href="/forgot-password" class="text-link">Lupa password?</a>
                </div>

                <div class="form-actions form-actions--stacked">
                    <button type="submit" class="primary-button">Masuk</button>
                    <p>Belum punya akun? <a href="/register" class="text-link">Daftar di sini</a>.</p>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
