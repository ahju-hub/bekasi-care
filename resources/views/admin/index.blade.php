@extends('layout')

@section('title', 'Dashboard Admin | Bekasi Care')

@section('content')
<section class="hero-section hero-section--compact">
    <div class="hero-grid">
        <div class="hero-copy">
            <span class="eyebrow">Dashboard admin</span>
            <h1>Pusat pemantauan laporan warga Kabupaten Bekasi.</h1>
            <p class="hero-copy__lead">
                Kelola data pengaduan yang masuk, lihat detail kejadian, dan pantau volume laporan terbaru dari satu dashboard yang seragam dengan tampilan publik.
            </p>
        </div>

        <aside class="hero-panel">
            <div class="metric-row metric-row--stacked">
                <div class="metric-box">
                    <strong>{{ $stats['total'] }}</strong>
                    <span>Total laporan tersimpan</span>
                </div>
                <div class="metric-box">
                    <strong>{{ $stats['baru'] }}</strong>
                    <span>Laporan berstatus baru</span>
                </div>
                <div class="metric-box">
                    <strong>{{ $stats['hari_ini'] }}</strong>
                    <span>Laporan masuk hari ini</span>
                </div>
            </div>
        </aside>
    </div>
</section>

<section class="content-section">
    <div class="section-card admin-table-card">
        <div class="section-heading">
            <div>
                <span class="eyebrow">Data pengaduan</span>
                <h2>Daftar laporan terbaru</h2>
            </div>
            <p>Login sebagai <strong>{{ auth()->user()->name }}</strong>. <a href="/logout" class="text-link">Keluar</a></p>
        </div>

        @if (session('success'))
            <div class="alert-box alert-box--success">{{ session('success') }}</div>
        @endif

        <div class="table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Pelapor</th>
                        <th>Jenis</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengaduans as $item)
                        <tr>
                            <td>
                                <strong>{{ $item->nama }}</strong>
                                <span>{{ $item->telepon }}</span>
                            </td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ $item->lokasi }}</td>
                            <td><span class="table-badge">{{ $item->status }}</span></td>
                            <td>{{ $item->created_at?->format('d M Y H:i') }}</td>
                            <td class="table-actions">
                                <a href="/admin/detail/{{ $item->id }}" class="text-link">Detail</a>
                                <a href="/admin/hapus/{{ $item->id }}" class="text-link text-link--danger" onclick="return confirm('Hapus laporan ini?')">Hapus</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty-state">Belum ada data pengaduan yang tersimpan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-wrap">
            {{ $pengaduans->links() }}
        </div>
    </div>
</section>
@endsection
