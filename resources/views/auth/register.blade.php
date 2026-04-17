@extends('layout')

@section('title', 'Register | Bekasi Care')

@section('content')
<section class="auth-section">
    <div class="auth-shell">
        <div class="auth-copy section-card section-card--dark">
            <span class="eyebrow eyebrow--light">Registrasi akun</span>
            <h1>Buat akun untuk akses pelaporan yang lebih praktis dan terorganisir.</h1>
            <p>
                Registrasi membantu Anda menyimpan identitas dasar untuk penggunaan berikutnya dan memberi struktur yang lebih baik pada pelaporan yang masuk ke sistem.
            </p>

            <div class="auth-points">
                <div class="info-chip info-chip--dark">
                    <strong>Form lebih cepat</strong>
                    <p>Setelah akun aktif, proses masuk ke sistem menjadi lebih ringkas saat membutuhkan akses kembali.</p>
                </div>
                <div class="info-chip info-chip--dark">
                    <strong>Data lebih rapi</strong>
                    <p>Informasi pelapor tersimpan sebagai user system yang terhubung dengan ORM Laravel.</p>
                </div>
            </div>
        </div>

        <div class="section-card auth-card">
            <div class="section-heading section-heading--stacked">
                <div>
                    <span class="eyebrow">Buat akun</span>
                    <h2>Daftar pengguna baru</h2>
                </div>
                <p>Lengkapi data berikut untuk membuat akun Bekasi Care.</p>
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

            <form action="/register" method="POST" class="report-form">
                @csrf

                <label class="form-field">
                    <span>Nama Lengkap</span>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                </label>

                <label class="form-field">
                    <span>Email</span>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
                </label>

                <div class="field-grid">
                    <label class="form-field">
                        <span>Password</span>
                        <input type="password" name="password" placeholder="Minimal 8 karakter" required>
                    </label>

                    <label class="form-field">
                        <span>Konfirmasi Password</span>
                        <input type="password" name="password_confirmation" placeholder="Ulangi password" required>
                    </label>
                </div>

                <div class="form-actions form-actions--stacked">
                    <button type="submit" class="primary-button">Daftar Sekarang</button>
                    <p>Sudah punya akun? <a href="/login" class="text-link">Masuk di sini</a>.</p>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
