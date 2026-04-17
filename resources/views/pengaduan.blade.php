@extends('layout')

@section('title', 'Pengaduan Darurat | Bekasi Care')

@section('content')
<section class="hero-section">
    <div class="hero-grid">
        <div class="hero-copy">
            <span class="eyebrow">Layanan pelaporan cepat</span>
            <h1>Laporkan keadaan darurat dengan alur yang singkat, jelas, dan siap diteruskan ke petugas.</h1>
            <p class="hero-copy__lead">
                Bekasi Care membantu warga Kabupaten Bekasi mengirim informasi kejadian darurat, lokasi, dan dokumentasi awal dalam satu formulir yang mudah dipakai dari ponsel maupun desktop.
            </p>

            <div class="hero-highlights">
                <article class="info-chip">
                    <strong>Respons lebih terarah</strong>
                    <p>Data kejadian, lokasi, dan kontak terkirim dalam format yang seragam.</p>
                </article>
                <article class="info-chip">
                    <strong>Siap 24 jam</strong>
                    <p>Cocok untuk laporan medis, kecelakaan, maupun kejadian yang butuh tindak lanjut cepat.</p>
                </article>
                <article class="info-chip">
                    <strong>Dokumentasi awal</strong>
                    <p>Lampiran foto membantu tim memahami situasi sebelum berangkat ke lokasi.</p>
                </article>
            </div>
        </div>

        <aside class="hero-panel">
            <div class="status-card">
                <span class="status-card__label">Status layanan</span>
                <strong>Siaga koordinasi 24/7</strong>
                <p>Pastikan nomor telepon aktif agar petugas dapat menghubungi Anda untuk verifikasi cepat.</p>
            </div>

            <div class="metric-row">
                <div class="metric-box">
                    <strong>3 langkah</strong>
                    <span>Isi data, jelaskan kejadian, kirim laporan</span>
                </div>
                <div class="metric-box">
                    <strong>1 form</strong>
                    <span>Satu pintu pelaporan warga Kabupaten Bekasi</span>
                </div>
            </div>
        </aside>
    </div>
</section>

<section class="content-section">
    <div class="form-layout">
        <div class="section-card section-card--soft">
            <span class="eyebrow">Panduan singkat</span>
            <h2>Informasi yang paling membantu petugas</h2>
            <ul class="guidance-list">
                <li>Sebutkan lokasi sejelas mungkin: patokan jalan, gedung, atau RT/RW bila ada.</li>
                <li>Pilih jenis kejadian yang paling mendekati kondisi di lapangan.</li>
                <li>Gunakan deskripsi singkat namun spesifik, misalnya jumlah korban atau kondisi sekitar.</li>
                <li>Unggah foto bila aman dilakukan dan tidak membahayakan pelapor.</li>
            </ul>
        </div>

        <div class="section-card form-card">
            <div class="section-heading">
                <div>
                    <span class="eyebrow">Formulir pengaduan</span>
                    <h2>Kirim laporan darurat</h2>
                </div>
                <p>Isi data inti berikut agar laporan bisa segera diproses.</p>
            </div>

            @if (session('success'))
                <div class="alert-box alert-box--success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-box alert-box--danger">
                    <strong>Periksa kembali data Anda.</strong>
                    <ul class="error-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/pengaduan/store" method="POST" enctype="multipart/form-data" class="report-form">
                @csrf

                <div class="field-grid">
                    <label class="form-field">
                        <span>Nama Pelapor</span>
                        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                    </label>

                    <label class="form-field">
                        <span>No. Telepon</span>
                        <input type="text" name="telepon" value="{{ old('telepon') }}" placeholder="Contoh: 0812xxxxxx" required>
                    </label>
                </div>

                <div class="field-grid">
                    <label class="form-field">
                        <span>Jenis Kejadian</span>
                        <select name="jenis" required>
                            <option value="Kecelakaan" {{ old('jenis') === 'Kecelakaan' ? 'selected' : '' }}>Kecelakaan</option>
                            <option value="Kebakaran" {{ old('jenis') === 'Kebakaran' ? 'selected' : '' }}>Kebakaran</option>
                            <option value="Darurat Medis" {{ old('jenis') === 'Darurat Medis' ? 'selected' : '' }}>Darurat Medis</option>
                        </select>
                    </label>

                    <label class="form-field">
                        <span>Lokasi Kejadian</span>
                        <input type="text" name="lokasi" value="{{ old('lokasi') }}" placeholder="Jalan, kelurahan, atau titik patokan" required>
                    </label>
                </div>

                <label class="form-field">
                    <span>Deskripsi Kejadian</span>
                    <textarea name="deskripsi" rows="5" placeholder="Jelaskan kondisi singkat di lokasi">{{ old('deskripsi') }}</textarea>
                </label>

                <label class="form-field">
                    <span>Upload Foto Pendukung</span>
                    <input type="file" name="foto" accept="image/*">
                    <small>Opsional, tetapi sangat membantu untuk asesmen awal petugas.</small>
                </label>

                <div class="form-actions">
                    <button type="submit" class="primary-button">Kirim Laporan</button>
                    <p>Dengan mengirim formulir ini, Anda membantu proses respons menjadi lebih cepat dan akurat.</p>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
