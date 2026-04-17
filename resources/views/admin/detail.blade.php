@extends('layout')

@section('title', 'Detail Pengaduan | Bekasi Care')

@section('content')
<section class="content-section content-section--top">
    <div class="detail-layout">
        <div class="section-card">
            <div class="section-heading">
                <div>
                    <span class="eyebrow">Detail laporan</span>
                    <h2>{{ $pengaduan->jenis }}</h2>
                </div>
                <p><a href="/admin" class="text-link">Kembali ke dashboard</a></p>
            </div>

            <div class="detail-grid">
                <div class="detail-item">
                    <span>Nama Pelapor</span>
                    <strong>{{ $pengaduan->nama }}</strong>
                </div>
                <div class="detail-item">
                    <span>No. Telepon</span>
                    <strong>{{ $pengaduan->telepon }}</strong>
                </div>
                <div class="detail-item">
                    <span>Lokasi</span>
                    <strong>{{ $pengaduan->lokasi }}</strong>
                </div>
                <div class="detail-item">
                    <span>Status</span>
                    <strong>{{ $pengaduan->status }}</strong>
                </div>
            </div>

            <div class="detail-block">
                <span>Deskripsi Kejadian</span>
                <p>{{ $pengaduan->deskripsi ?: 'Tidak ada deskripsi tambahan.' }}</p>
            </div>

            <div class="detail-block">
                <span>Waktu Laporan</span>
                <p>{{ $pengaduan->created_at?->format('d M Y H:i:s') }}</p>
            </div>
        </div>

        <div class="section-card">
            <span class="eyebrow">Lampiran</span>
            <h2>Foto pendukung</h2>

            @if ($pengaduan->foto)
                <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Foto pengaduan" class="detail-image">
            @else
                <div class="empty-attachment">Pelapor tidak mengunggah foto pada laporan ini.</div>
            @endif
        </div>
    </div>
</section>
@endsection
