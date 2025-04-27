@extends('layout.main')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Barang</h1>
        <a href="{{ route('barang.sewa') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-200">
            Kembali
        </a>
    </div>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nama Barang --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Barang</label>
            <input type="text" name="name" id="name" value="{{ $barang->name }}" class="w-full px-4 py-2 border rounded" required>
        </div>

        {{-- Gambar Barang --}}
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Gambar Barang</label>
            <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded">
            <img src="{{ asset('storage/' . $barang->image_path) }}" class="w-32 h-32 mt-2">
        </div>

        {{-- Deskripsi Barang --}}
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" id="description" class="w-full px-4 py-2 border rounded" rows="4" required>{{ $barang->description }}</textarea>
        </div>

        {{-- Harga Barang --}}
        <div class="mb-4">
            <label for="cost" class="block text-sm font-medium text-gray-700">Harga</label>
            <input type="number" name="cost" id="cost" value="{{ $barang->cost }}" class="w-full px-4 py-2 border rounded" required>
        </div>

        {{-- Lokasi Barang --}}
        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700">Lokasi</label>
            <input type="text" name="location" id="location" value="{{ $barang->location }}" class="w-full px-4 py-2 border rounded" required>
        </div>

        {{-- Kategori Barang --}}
        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
            <input list="categories" name="category" id="category" value="{{ $barang->category }}" class="w-full px-4 py-2 border rounded" placeholder="Pilih atau ketik kategori" required>
            <datalist id="categories">
                <option value="Elektronik">
                <option value="Aksesoris">
                <option value="Peralatan Konstruksi">
                <option value="Pakaian">
                <option value="Lainnya">
            </datalist>
        </div>

        {{-- Stok Barang --}}
        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
            <input type="number" name="stock" id="stock" value="{{ $barang->stock }}" class="w-full px-4 py-2 border rounded" required>
        </div>

        {{-- Kondisi Barang --}}
        <div class="mb-4">
            <label for="condition" class="block text-sm font-medium text-gray-700">Kondisi</label>
            <input type="text" name="condition" id="condition" value="{{ $barang->condition }}" class="w-full px-4 py-2 border rounded" required>
        </div>

        {{-- Link WhatsApp --}}
        <div class="mb-4">
            <label for="link" class="block text-sm font-medium text-gray-700">Link WhatsApp</label>
            <input type="url" name="link" id="link" value="{{ $barang->link }}" class="w-full px-4 py-2 border rounded">
        </div>

        {{-- Status Barang --}}
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="w-full px-4 py-2 border rounded">
                <option value="1" {{ $barang->status == '1' ? 'selected' : '' }}>Tersedia</option>
                <option value="0" {{ $barang->status == '0' ? 'selected' : '' }}>Tidak Tersedia</option>
            </select>
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-200">
            Simpan Perubahan
        </button>
    </form>

    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="mt-4" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-200">
            Hapus Barang
        </button>
    </form>
</div>
@endsection