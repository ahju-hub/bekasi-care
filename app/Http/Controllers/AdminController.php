<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        if (! $request->user()) {
            return redirect('/login')->withErrors(['email' => 'Silakan login sebagai admin terlebih dahulu.']);
        }

        $pengaduans = Pengaduan::query()
            ->latest()
            ->paginate(10);

        $todayStart = now('Asia/Jakarta')->startOfDay()->timezone('UTC');
        $todayEnd = now('Asia/Jakarta')->endOfDay()->timezone('UTC');

        $stats = [
            'total' => Pengaduan::count(),
            'baru' => Pengaduan::where('status', 'Baru')->count(),
            'hari_ini' => Pengaduan::whereBetween('created_at', [$todayStart, $todayEnd])->count(),
        ];

        return view('admin.index', compact('pengaduans', 'stats'));
    }

    public function detail(Request $request, int $id): View|RedirectResponse
    {
        if (! $request->user()) {
            return redirect('/login');
        }

        $pengaduan = Pengaduan::findOrFail($id);

        return view('admin.detail', compact('pengaduan'));
    }

    public function hapus(Request $request, int $id): RedirectResponse
    {
        if (! $request->user()) {
            return redirect('/login');
        }

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        return redirect('/admin')->with('success', 'Data pengaduan berhasil dihapus.');
    }
}
