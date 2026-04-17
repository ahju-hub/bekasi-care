<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string', 'max:30'],
            'jenis' => ['required', 'string', 'max:100'],
            'lokasi' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'foto' => ['nullable', 'image', 'max:3072'],
        ]);

        $path = $request->hasFile('foto')
            ? $request->file('foto')->store('pengaduan', 'public')
            : null;

        Pengaduan::create([
            'user_id' => Auth::id(),
            'nama' => $data['nama'],
            'telepon' => $data['telepon'],
            'jenis' => $data['jenis'],
            'lokasi' => $data['lokasi'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'foto' => $path,
            'status' => 'Baru',
        ]);

        return back()->with('success', 'Laporan berhasil dikirim. Tim akan meninjau informasi yang Anda kirim.');
    }
}
