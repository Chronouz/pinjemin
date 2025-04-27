<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use App\Models\Permintaan;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data barang yang dipinjam oleh user yang sedang login
        $Pinjam = Pinjam::with(['barang.user'])
            ->where('user_id', Auth::id()) // Filter berdasarkan user yang sedang login
            ->get();

        // Tambahkan data permintaan secara manual
        foreach ($Pinjam as $item) {
            $item->permintaan = \App\Models\Permintaan::where('barang_id', $item->barang_id)
                ->where('peminjam_id', $item->user_id)
                ->first();
        }

        // Ambil data notifikasi dari tabel riwayat
        $riwayat = DB::table('riwayat')
            ->where('peminjam_id', Auth::id())
            ->orWhere('pemilik_id', Auth::id())
            ->get();

        return view('barang.pinjam', compact('Pinjam', 'riwayat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pinjam $pinjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pinjam $pinjam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pinjam $pinjam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pinjam $pinjam)
    {
        //
    }

    public function return(Request $request, $id)
    {
        // Ambil data pinjam berdasarkan barang_id dan user_id
        $pinjam = Pinjam::where('barang_id', $id)->where('user_id', Auth::id())->first();

        if (!$pinjam) {
            return response()->json(['message' => 'Data pinjam tidak ditemukan.'], 404);
        }

        // Ambil data permintaan terkait
        $permintaan = Permintaan::where('barang_id', $id)->where('peminjam_id', Auth::id())->first();

        if (!$permintaan) {
            return response()->json(['message' => 'Data permintaan tidak ditemukan.'], 404);
        }

        // Tambahkan data ke tabel riwayat
        Riwayat::create([
            'barang_id' => $id,
            'pemilik_id' => $permintaan->pemilik_id,
            'peminjam_id' => $permintaan->peminjam_id,
            'pesan' => $request->message ?? 'Barang telah dikembalikan.', // Pesan default jika tidak diisi
        ]);

        // Ubah status barang menjadi "Tersedia"
        $barang = $pinjam->barang;
        if ($barang) {
            $barang->update(['status' => 1]); // 1 = Tersedia
        }

        // Hapus data dari tabel pinjam dan permintaan
        $pinjam->delete();
        $permintaan->delete();

        return response()->json(['success' => true]);
    }
}
