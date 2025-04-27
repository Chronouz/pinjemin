@extends('layout.main')

@section('content')
    <div class="p-4">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-4xl font-extrabold text-blue-600 tracking-wide drop-shadow-md">
                Barang yang <span class="text-blue-800">Anda Pinjam</span>
            </h2>
        </div>

        {{-- Grid Barang --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($Pinjam as $item)
                <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-200">
                    <img src="{{ asset('storage/' . $item->barang->image_path) }}" class="w-full h-48 object-cover mb-4 rounded-lg">
                    <h3 class="font-semibold text-lg text-gray-800">{{ $item->barang->name }}</h3>
                    <p class="text-sm text-gray-500 mb-2">{{ $item->barang->category }} - {{ $item->barang->location }}</p>
                    <p class="text-sm mb-2 text-gray-600">{{ Str::limit($item->barang->description, 100) }}</p>
                    <div class="text-sm font-bold text-green-600">Rp {{ number_format($item->barang->cost, 0, ',', '.') }}</div>
                    <div class="text-sm font-bold {{ $item->permintaan && $item->permintaan->status === 'diterima' ? 'text-green-600' : 'text-red-600' }}">
                        {{ $item->permintaan && $item->permintaan->status === 'diterima' ? 'Diterima' : 'Pending' }}
                    </div>
                    <div class="flex justify-between mt-4">
                        <button onclick="showReturnPopup({{ $item->barang->id }})"
                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                            Kembalikan
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Belum ada barang yang dipinjam.</p>
            @endforelse
        </div>
    </div>

    <!-- Popup Konfirmasi -->
    <div id="return-popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-96">
            <p class="text-sm mb-4">Apakah Anda yakin ingin mengembalikan barang ini?</p>
            <div class="flex justify-between">
                <button onclick="closeReturnPopup()" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                <button onclick="confirmReturn()" class="bg-yellow-500 text-white px-4 py-2 rounded">Konfirmasi</button>
            </div>
        </div>
    </div>

    <!-- Popup Pesan -->
    <div id="message-popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-96">
            <p class="text-sm mb-4">Tambahkan pesan (opsional):</p>
            <textarea id="return-message" class="w-full px-4 py-2 border rounded" rows="4"
                placeholder="Pesan tambahan..."></textarea>
            <div class="flex justify-between mt-4">
                <button onclick="closeMessagePopup()" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                <button onclick="submitReturn()" class="bg-yellow-500 text-white px-4 py-2 rounded">Kirim</button>
            </div>
        </div>
    </div>
@endsection

<script>
    let selectedBarangId = null;

    function showReturnPopup(barangId) {
        selectedBarangId = barangId;
        document.getElementById('return-popup').classList.remove('hidden');
    }

    function closeReturnPopup() {
        document.getElementById('return-popup').classList.add('hidden');
    }

    function confirmReturn() {
        closeReturnPopup();
        document.getElementById('message-popup').classList.remove('hidden');
    }

    function closeMessagePopup() {
        document.getElementById('message-popup').classList.add('hidden');
    }

    async function submitReturn() {
        const message = document.getElementById('return-message').value || 'Barang telah dikembalikan.';
        try {
            const response = await fetch(`/pinjam/${selectedBarangId}/return`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ message })
            });

            if (response.ok) {
                alert('Barang berhasil dikembalikan.');
                location.reload();
            } else {
                const errorData = await response.json();
                alert(`Gagal mengembalikan barang: ${errorData.message || 'Terjadi kesalahan.'}`);
            }
        } catch (error) {
            console.error(error);
            alert('Terjadi kesalahan pada permintaan.');
        }
    }
</script>
