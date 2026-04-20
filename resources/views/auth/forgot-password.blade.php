@extends('layout')

@section('title', 'Lupa Password | Bekasi Care')

@section('content')
<section class="auth-section">
    <div class="auth-shell">
        <div class="auth-copy section-card section-card--dark">
            <span class="eyebrow eyebrow--light">Pemulihan akses</span>
            <h1>Atur ulang password akun Bekasi Care.</h1>
            <p>
                Gunakan email yang sudah terdaftar, lalu buat password baru agar bisa masuk kembali ke sistem pelaporan.
            </p>

            <div class="auth-points">
                <div class="info-chip info-chip--dark">
                    <strong>Email terdaftar</strong>
                    <p>Pastikan email sesuai dengan akun yang pernah dibuat di Bekasi Care.</p>
                </div>
                <div class="info-chip info-chip--dark">
                    <strong>Password baru</strong>
                    <p>Gunakan minimal 8 karakter agar akses akun tetap lebih aman.</p>
                </div>
            </div>
        </div>

        <div class="section-card auth-card">
            <div class="section-heading section-heading--stacked">
                <div>
                    <span class="eyebrow">Lupa password</span>
                    <h2>Buat password baru</h2>
                </div>
                <p>Isi email akun dan password baru yang ingin digunakan.</p>
            </div>

            @if ($errors->any())
                <div class="alert-box alert-box--danger">
                    <ul class="error-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/forgot-password" method="POST" class="report-form">
                @csrf

                <label class="form-field">
                    <span>Email</span>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
                </label>

                <label class="form-field">
                    <span>Password Baru</span>
                    <input type="password" name="password" placeholder="Minimal 8 karakter" required>
                </label>

                <label class="form-field">
                    <span>Konfirmasi Password Baru</span>
                    <input type="password" name="password_confirmation" placeholder="Ulangi password baru" required>
                </label>

                <div class="form-actions form-actions--stacked">
                    <button type="submit" class="primary-button">Simpan Password</button>
                    <p>Sudah ingat password? <a href="/login" class="text-link">Kembali ke login</a>.</p>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
