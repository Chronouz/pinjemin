@extends('layout.main')

@section('content')
<h2 class="text-xl font-bold mb-4">Permintaan Peminjaman</h2>

{{-- Jika user adalah pemilik --}}
@if ($permintaanUntukPemilik->isNotEmpty())
    @foreach ($permintaanUntukPemilik as $p)
        <div class="bg-white p-4 rounded shadow mb-4">
            <p><strong>{{ $p->peminjam->name }}</strong> ingin meminjam <strong>{{ $p->barang->name }}</strong></p>
            <p><strong>No Telp:</strong> {{ $p->peminjam->profil->phone ?? 'Tidak tersedia' }}</p>
            <div class="flex gap-4 mt-2">
                <form action="{{ route('permintaan.terima', $p->id) }}" method="POST">
                    @csrf
                    <button class="bg-green-500 text-white px-4 py-1 rounded">Terima</button>
                </form>
                <form action="{{ route('permintaan.tolak', $p->id) }}" method="POST">
                    @csrf
                    <button class="bg-red-500 text-white px-4 py-1 rounded">Tolak</button>
                </form>
            </div>
        </div>
    @endforeach
@else
    <p class="text-gray-600">Tidak ada permintaan saat ini.</p>
@endif

{{-- Jika user adalah peminjam --}}
@if ($permintaanUntukPeminjam->isNotEmpty())
    <h2 class="text-xl font-bold mt-6 mb-4">Status Permintaan Anda</h2>
    @foreach ($permintaanUntukPeminjam as $p)
        <div class="bg-white p-4 rounded shadow mb-4">
            <p><strong>Barang:</strong> {{ $p->barang->name }}</p>
            <p><strong>Status:</strong> 
                @if ($p->status === 'ditolak')
                    <span class="text-red-500">Ditolak</span>
                @elseif ($p->status === 'diterima')
                    <span class="text-green-500">Diterima</span>
                @else
                    <span class="text-yellow-500">Pending</span>
                @endif
            </p>
            @if ($p->status === 'ditolak')
                <form action="{{ route('permintaan.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus permintaan ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-4 py-1 rounded mt-2">Hapus</button>
                </form>
            @endif
        </div>
    @endforeach
@endif

{{-- Notifikasi Riwayat --}}
<div class="p-6">
    <h2 class="text-2xl font-semibold mb-4">Notifikasi</h2>

    @forelse ($riwayat as $item)
        <div class="bg-white p-4 rounded shadow mb-4">
            <p class="text-gray-800">
                <strong>Barang:</strong> {{ $item->barang->name }} telah dikembalikan oleh 
                <strong>{{ $item->peminjam->name }}</strong> pada tanggal 
                <strong>{{ $item->created_at->format('d M Y, H:i') }}</strong>.
            </p>
            <p class="text-gray-600 mt-2"><strong>Pesan:</strong> {{ $item->pesan }}</p>
            <form action="{{ route('riwayat.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus riwayat ini?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-4 py-1 rounded mt-2">Hapus</button>
            </form>
        </div>
    @empty
        <p class="text-gray-500">Belum ada notifikasi.</p>
    @endforelse
</div>
@endsection
