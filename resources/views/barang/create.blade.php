@extends('layout.main')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-10">
        <h1 class="text-2xl font-bold mb-4">Tambah Barang</h1>

        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Nama Barang --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" required>
            </div>

            {{-- Gambar Barang --}}
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Gambar Barang</label>
                <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded" required
                    onchange="previewImage(event)">
                <div id="previewContainer" class="mt-4 hidden">
                    <p class="block font-semibold mb-1">Preview:</p>
                    <img id="imagePreview" src="" class="w-80 h-120 object-cover rounded-lg shadow-md">
                </div>
            </div>

            {{-- Deskripsi Barang --}}
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" class="w-full px-4 py-2 border rounded" rows="4" required></textarea>
            </div>

            {{-- Harga Barang --}}
            <div class="mb-4">
                <label for="cost" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="cost" id="cost" class="w-full px-4 py-2 border rounded" required>
            </div>

            {{-- Lokasi Barang --}}
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Lokasi</label>
                <input type="text" name="location" id="location" class="w-full px-4 py-2 border rounded" required>
            </div>

            {{-- Kategori Barang --}}
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                <input list="categories" name="category" id="category" class="w-full px-4 py-2 border rounded"
                    placeholder="Pilih atau ketik kategori" required>
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
                <input type="number" name="stock" id="stock" class="w-full px-4 py-2 border rounded" required>
            </div>

            {{-- Kondisi Barang --}}
            <div class="mb-4">
                <label for="condition" class="block text-sm font-medium text-gray-700">Kondisi</label>
                <input type="text" name="condition" id="condition" class="w-full px-4 py-2 border rounded" required>
            </div>

            {{-- Link WhatsApp --}}
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                <div class="flex items-center gap-2">
                    <input type="text" name="phone" id="phone" class="w-full px-4 py-2 border rounded"
                        placeholder="8123456789">
                    <button type="button" onclick="generateWhatsAppLink()"
                        class="bg-green-500 text-white px-4 py-2 rounded">Generate Link</button>
                </div>
            </div>

            <div class="mb-4">
                <label for="link" class="block text-sm font-medium text-gray-700">Link WhatsApp</label>
                <input type="url" name="link" id="link" class="w-full px-4 py-2 border rounded"
                    placeholder="https://wa.me/62xxxxxxxxxx" readonly>
            </div>

            {{-- Status Barang --}}
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="w-full px-4 py-2 border rounded">
                    <option value="1">Tersedia</option> <!-- Nilai dikirim sebagai 1 -->
                    <option value="0">Tidak Tersedia</option> <!-- Nilai dikirim sebagai 0 -->
                </select>
            </div>

            {{-- Tombol --}}
            <div class="flex justify-between mt-6">
                <a href="{{ route('barang.sewa') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                <div>
                    <button type="reset" class="bg-yellow-500 text-white px-4 py-2 rounded">Reset</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Barang</button>
                </div>
            </div>

        </form>
    </div>
@endsection
