<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use App\Models\Barang;
use App\Models\Riwayat;
use App\Models\Pinjam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Permintaan untuk pemilik
        $permintaanUntukPemilik = Permintaan::with(['barang', 'peminjam.profil']) // Tambahkan relasi profile
            ->where('pemilik_id', $userId)
            ->where('status', 'pending')
            ->get();

        // Permintaan untuk peminjam
        $permintaanUntukPeminjam = Permintaan::with(['barang', 'pemilik.profil']) // Tambahkan relasi profile
            ->where('peminjam_id', $userId)
            ->get();

        // Data riwayat
        $riwayat = Riwayat::with(['barang', 'peminjam'])
        ->where('pemilik_id', $userId)
        ->orWhere('peminjam_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('permintaan.index', compact('permintaanUntukPemilik', 'permintaanUntukPeminjam', 'riwayat'));
    }

    public function store(Request $request)
    {
        $barang = Barang::findOrFail($request->barang_id);

        Permintaan::create([
            'barang_id' => $barang->id,
            'peminjam_id' => Auth::id(),
            'pemilik_id' => $barang->user_id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Permintaan peminjaman dikirim!');
    }

    public function terima($id)
    {
        $permintaan = Permintaan::findOrFail($id);
        $permintaan->update(['status' => 'diterima']);

        // Update status barang menjadi tidak tersedia
        $barang = $permintaan->barang;
        $barang->update(['status' => 0]);

        // Tambahkan ke tabel pinjam
        Pinjam::create([
            'user_id' => $permintaan->peminjam_id,
            'barang_id' => $permintaan->barang_id,
        ]);

        return redirect()->back()->with('success', 'Permintaan diterima.');
    }

    public function tolak($id)
    {
        $permintaan = Permintaan::findOrFail($id);
        $permintaan->update(['status' => 'ditolak']);

        return redirect()->back()->with('info', 'Permintaan ditolak.');
    }

    public function destroy($id)
    {
        $permintaan = Permintaan::findOrFail($id);
        $permintaan->delete();

        return redirect()->back()->with('success', 'Permintaan berhasil dihapus.');
    }
}
