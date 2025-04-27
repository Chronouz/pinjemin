<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pinjam;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        // Ambil barang berdasarkan user_id (pemilik barang)
        $barang = Barang::with(['permintaan' => function ($query) {
            $query->where('status', 'diterima'); // Hanya ambil permintaan yang diterima
        }, 'permintaan.peminjam']) // Ambil data peminjam dari relasi permintaan
        ->where('user_id', Auth::id()) // Ganti pemilik_id dengan user_id
        ->get();

        return view('barang.sewa', compact('barang'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Ambil input pencarian
        $results = Barang::where('name', 'LIKE', "%{$query}%")->get(); // Cari barang berdasarkan nama

        return view('search.results', compact('results', 'query')); // Kirim hasil pencarian ke view
    }

    public function katalog()
    {
        // Ambil semua barang yang tidak terdaftar di tabel pinjam
        $barang = Barang::whereDoesntHave('pinjam')->get();

        return view('view.katalog', compact('barang'));
    }

    public function homepage()
    {
        // Ambil semua barang yang tidak terdaftar di tabel pinjam
        $barang = Barang::whereDoesntHave('pinjam')->get();

        return view('view.homepage', compact('barang'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'description' => 'required',
            'cost' => 'required|numeric',
            'location' => 'required',
            'category' => 'required',
            'stock' => 'required|integer',
            'condition' => 'required',
            'link' => 'nullable|url', // Validasi untuk link WhatsApp
            'status' => 'required|boolean',
        ]);

        $path = $request->file('image')->store('barang', 'public');
        $validated['image_path'] = $path;

        // Tambahkan user_id dari pengguna yang login
        $validated['user_id'] = Auth::id();

        // Simpan data ke database
        Barang::create($validated);

        return redirect()->route('barang.sewa')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang = Barang::where('user_id', Auth::id())->findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::where('user_id', Auth::id())->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric',
            'location' => 'required',
            'category' => 'required',
            'stock' => 'required|integer',
            'condition' => 'required',
            'link' => 'nullable|url', // Validasi untuk link WhatsApp
            'status' => 'required|boolean',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($barang->image_path);
            $barang->image_path = $request->file('image')->store('barang', 'public');
        }

        $barang->update($validated);
        return redirect()->route('barang.sewa')->with('success', 'Barang berhasil diperbarui!');
    }

    public function getByCategory(Request $request)
    {
        $category = $request->query('category');

        // Validasi input
        if (!$category) {
            return response()->json(['error' => 'Kategori tidak ditemukan'], 400);
        }

        // Ambil barang berdasarkan kategori
        $barang = Barang::where('category', $category)
        ->whereDoesntHave('pinjam') // Ambil barang yang tidak terdaftar di tabel pinjam
        ->get();

        // Jika tidak ada barang, kembalikan array kosong
        if ($barang->isEmpty()) {
            return response()->json([]);
        }

        // Kembalikan data barang
        return response()->json($barang);
    }

    public function getById($id)
    {
        // Cari barang berdasarkan ID
        $barang = Barang::find($id);

        // Jika barang tidak ditemukan, kembalikan error 404
        if (!$barang) {
            return response()->json(['error' => 'Barang tidak ditemukan'], 404);
        }

        // Kembalikan data barang dalam format JSON
        return response()->json($barang);
    }

    public function destroy($id)
    {
        $barang = Barang::where('user_id', Auth::id())->findOrFail($id);
        Storage::disk('public')->delete($barang->image_path);
        $barang->delete();
        return redirect()->route('barang.sewa');
    }
}
