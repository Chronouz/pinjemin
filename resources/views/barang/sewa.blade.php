@extends('layout.main')

@section('content')
    <div class="p-4">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-4xl font-extrabold text-blue-600 tracking-wide drop-shadow-md">
                Barang yang <span class="text-blue-800">Anda Sewakan</span>
            </h2>
            <a href="{{ route('barang.create') }}"
                class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition duration-200">
                + Tambah Barang
            </a>
        </div>

        {{-- Grid Barang --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($barang as $item)
                <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-200">
                    <img src="{{ asset('storage/' . $item->image_path) }}" class="w-full h-48 object-cover mb-4 rounded-lg">
                    <h3 class="font-semibold text-lg text-gray-800">{{ $item->name }}</h3>
                    <p class="text-sm text-gray-500 mb-2">{{ $item->category }} - {{ $item->location }}</p>
                    <p class="text-sm mb-2 text-gray-600">{{ Str::limit($item->description, 100) }}</p>
                    <div class="text-sm font-bold text-green-600">Rp {{ number_format($item->cost, 0, ',', '.') }}</div>
                    <div class="text-sm font-bold {{ $item->status === 1 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $item->status === 1 ? 'Tersedia' : 'Tidak Tersedia' }}
                    </div>
                    @if ($item->status === 0 && $item->permintaan->isNotEmpty())
                        <p class="text-sm text-purple-700 mt-2">
                            <strong>Dipinjam oleh:</strong> {{ $item->permintaan->first()->peminjam->name }}
                        </p>
                    @endif
                    <div class="flex justify-between mt-4">
                        <a href="{{ route('barang.edit', $item->id) }}"
                            class="text-yellow-500 hover:text-yellow-600 transition duration-200">
                            Edit
                        </a>
                        <form action="{{ route('barang.destroy', $item->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:text-red-600 transition duration-200">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
