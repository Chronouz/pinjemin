@extends('layout.main')

@section('content')
    <section class="py-10 px-6">
        <!-- Navbar Permintaan Peminjaman -->
        <div class="bg-orange-100 py-4 px-6 rounded-lg shadow-md mb-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <h1 class="text-2xl font-bold text-orange-600 tracking-wide">
                    Permintaan Peminjaman
                </h1>
            </div>
        </div>

        <!-- Permintaan untuk Pemilik -->
        @if ($permintaanUntukPemilik->isNotEmpty())
            <h2 class="text-xl font-bold mb-4">Permintaan Peminjaman</h2>
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

        <!-- Navbar Status Permintaan Anda -->
        <div class="bg-orange-100 py-4 px-6 rounded-lg shadow-md mb-6 mt-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <h1 class="text-2xl font-bold text-orange-600 tracking-wide">
                    Status Permintaan Anda
                </h1>
            </div>
        </div>

        <!-- Status Permintaan Anda -->
        @if ($permintaanUntukPeminjam->isNotEmpty())
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
                        <form action="{{ route('permintaan.destroy', $p->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus permintaan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-4 py-1 rounded mt-2">Hapus</button>
                        </form>
                    @endif
                </div>
            @endforeach
        @else
            <p class="text-gray-600">Tidak ada status permintaan saat ini.</p>
        @endif

        <!-- Navbar Notifikasi -->
        <div class="bg-orange-100 py-4 px-6 rounded-lg shadow-md mb-6 mt-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <h1 class="text-2xl font-bold text-orange-600 tracking-wide">
                    Notifikasi
                </h1>
            </div>
        </div>

        <!-- Notifikasi -->
        @forelse ($riwayat as $item)
            <div class="bg-white p-4 rounded shadow mb-4">
                <p class="text-gray-800">
                    <strong>Barang:</strong> {{ $item->barang->name }} telah dikembalikan oleh
                    <strong>{{ $item->peminjam->name }}</strong> pada tanggal
                    <strong>{{ $item->created_at->format('d M Y, H:i') }}</strong>.
                </p>
                <p class="text-gray-600 mt-2"><strong>Pesan:</strong> {{ $item->pesan }}</p>
                <form action="{{ route('riwayat.destroy', $item->id) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus riwayat ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-4 py-1 rounded mt-2">Hapus</button>
                </form>
            </div>
        @empty
            <p class="text-gray-500">Belum ada notifikasi.</p>
        @endforelse
    </section>
@endsection
