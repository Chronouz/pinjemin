@extends('layout.main')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Barang Disewakan</h2>
    <a href="{{ route('barang.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Tambah Barang</a>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($barangDisewakan as $barang)
            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-semibold">{{ $barang->nama }}</h3>
                <p class="text-sm text-gray-500">{{ $barang->deskripsi }}</p>
                <div class="flex justify-between mt-4">
                    <a href="{{ route('barang.edit', $barang->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="text-red-500 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="text-xl font-bold mt-10 mb-4">Barang yang Dipinjam</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($barangDipinjam as $pinjam)
            <div class="bg-gray-100 p-4 rounded">
                <p><strong>Nama:</strong> {{ $pinjam->barang->nama }}</p>
                <p><strong>Tanggal Pinjam:</strong> {{ $pinjam->tanggal_pinjam }}</p>
                <p><strong>Status:</strong> {{ $pinjam->status }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
