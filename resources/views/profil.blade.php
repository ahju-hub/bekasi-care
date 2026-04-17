@extends('layout')

@section('title', 'Profil Layanan | Bekasi Care')

@section('content')
<section class="hero-section hero-section--compact">
    <div class="hero-grid">
        <div class="hero-copy">
            <span class="eyebrow">Profil layanan</span>
            <h1>Bekasi Care PSC 119 hadir untuk mempercepat penerimaan laporan dan koordinasi penanganan darurat.</h1>
            <p class="hero-copy__lead">
                Platform ini dirancang sebagai titik masuk digital untuk warga yang membutuhkan bantuan pada situasi kesehatan darurat, kecelakaan, maupun kejadian mendesak lain yang memerlukan tindak lanjut cepat.
            </p>
        </div>

        <aside class="hero-panel">
            <div class="status-card">
                <span class="status-card__label">Fokus utama</span>
                <strong>Pelaporan ringkas, data jelas, koordinasi lebih cepat</strong>
                <p>Antarmuka dibuat sederhana agar masyarakat bisa mengirim informasi penting tanpa proses yang membingungkan.</p>
            </div>
        </aside>
    </div>
</section>

<section class="content-section">
    <div class="feature-grid">
        <article class="section-card">
            <span class="eyebrow">Misi</span>
            <h2>Membantu warga melapor dengan cepat</h2>
            <p>Menyediakan formulir pelaporan yang mudah dipahami agar informasi awal yang dibutuhkan petugas dapat terkumpul secara konsisten.</p>
        </article>

        <article class="section-card">
            <span class="eyebrow">Cakupan</span>
            <h2>Layanan untuk kebutuhan darurat</h2>
            <p>Meliputi pelaporan kejadian seperti darurat medis, kecelakaan, dan kebakaran yang membutuhkan respons atau koordinasi lanjutan.</p>
        </article>

        <article class="section-card">
            <span class="eyebrow">Pendekatan</span>
            <h2>Responsif di berbagai perangkat</h2>
            <p>Tampilan dirancang tetap nyaman dipakai di layar ponsel maupun desktop agar akses warga tidak terhambat kondisi perangkat.</p>
        </article>
    </div>
</section>
@endsection
