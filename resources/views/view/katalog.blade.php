@extends('layout.main')

@section('content')
<section class="py-10 px-6">
    <!-- Navbar Katalog -->
    <div class="bg-orange-100 py-4 px-6 rounded-lg shadow-md mb-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <!-- Dropdown Kategori -->
            <div class="relative">
                <select id="category-filter" onchange="filterByCategory()" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded shadow focus:outline-none">
                    <option value="">Semua Kategori</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Aksesoris">Aksesoris</option>
                    <option value="Peralatan Konstruksi">Peralatan Konstruksi</option>
                    <option value="Pakaian">Pakaian</option>
                </select>
            </div>

            <!-- Search Bar -->
            <div class="flex items-center gap-2 w-full md:w-auto">
                <input type="text" id="search-bar" placeholder="Cari barang..." class="border border-gray-300 py-2 px-4 rounded shadow focus:outline-none w-full md:w-96">
                <button onclick="searchBarang()" class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded shadow">
                    Cari
                </button>
            </div>

            <!-- Teks Katalog -->
            <h1 class="text-2xl font-bold text-orange-600 tracking-wide logo">
                Katalog Barang
            </h1>
        </div>
    </div>

    <!-- Grid Barang -->
    <div id="barang-container" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($barang as $item)
        <div class="bg-white rounded-lg shadow-md p-4" data-category="{{ $item->category }}" data-name="{{ strtolower($item->name) }}">
            <img src="/storage/{{ $item->image_path }}" alt="{{ $item->name }}" class="w-full h-32 object-cover rounded-md mb-4">
            <h3 class="text-lg font-bold">{{ $item->name }}</h3>
            <p class="text-sm text-gray-600">{{ $item->description }}</p>
            <p class="text-sm text-gray-600"><strong>Kategori:</strong> {{ $item->category }}</p>
            <p class="text-sm text-gray-600"><strong>Harga:</strong> Rp{{ number_format($item->cost, 0, ',', '.') }}</p>
            <div class="flex justify-between mt-4">
                <button onclick="showDetail({{ $item->id }})" class="bg-blue-500 text-white px-4 py-2 rounded">Detail</button>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Popup Detail Barang -->
<div id="popup-detail" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg p-6 w-96">
        <h2 id="popup-title" class="text-xl font-bold mb-4"></h2>
        <p id="popup-description" class="text-sm mb-4"></p>
        <p id="popup-price" class="text-sm mb-4"></p>
        <p id="popup-location" class="text-sm mb-4"></p>
        <p id="popup-category" class="text-sm mb-4"></p>
        <p id="popup-stock" class="text-sm mb-4"></p>
        <p id="popup-condition" class="text-sm mb-4"></p>
        <a id="popup-whatsapp" href="#" target="_blank" class="text-blue-500 underline mb-4 block">Hubungi via WhatsApp</a>
        <p id="popup-status" class="text-sm mb-4"></p>
        <div class="flex justify-between">
            <button onclick="closePopup()" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</button>
            <button onclick="showConfirmation()" class="bg-blue-500 text-white px-4 py-2 rounded">Pinjam</button>
        </div>
    </div>
</div>

<!-- Popup Konfirmasi -->
<div id="popup-confirmation" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg p-6 w-96">
        <p class="text-sm mb-4">Apakah Anda yakin ingin meminjam barang ini?</p>
        <div class="flex justify-between">
            <button onclick="closeConfirmation()" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
            <button onclick="confirmPinjam()" class="bg-blue-500 text-white px-4 py-2 rounded">Konfirmasi</button>
        </div>
    </div>
</div>

<script>
    let selectedBarangId = null;
    let selectedPemilikId = null;

    function filterByCategory() {
        const category = document.getElementById('category-filter').value.toLowerCase();
        const cards = document.querySelectorAll('#barang-container > div');

        cards.forEach(card => {
            const cardCategory = card.getAttribute('data-category').toLowerCase();
            if (category === '' || cardCategory === category) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function searchBarang() {
        const query = document.getElementById('search-bar').value.toLowerCase();
        const cards = document.querySelectorAll('#barang-container > div');

        cards.forEach(card => {
            const cardName = card.getAttribute('data-name');
            if (query === '' || cardName.includes(query)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    async function showDetail(id) {
        try {
            const response = await fetch(`/api/barang/${id}`);
            if (!response.ok) {
                throw new Error('Gagal memuat data barang.');
            }

            const barang = await response.json();

            selectedBarangId = barang.id;
            selectedPemilikId = barang.user_id;

            document.getElementById('popup-title').textContent = barang.name;
            document.getElementById('popup-description').textContent = barang.description;
            document.getElementById('popup-price').textContent = `Harga: Rp${barang.cost}`;
            document.getElementById('popup-location').textContent = `Lokasi: ${barang.location}`;
            document.getElementById('popup-category').textContent = `Kategori: ${barang.category}`;
            document.getElementById('popup-stock').textContent = `Stok: ${barang.stock}`;
            document.getElementById('popup-condition').textContent = `Kondisi: ${barang.condition}`;
            document.getElementById('popup-whatsapp').href = barang.link;
            document.getElementById('popup-status').textContent = `Status: ${barang.status ? 'Tersedia' : 'Tidak Tersedia'}`;

            document.getElementById('popup-detail').classList.remove('hidden');
        } catch (error) {
            alert(error.message);
        }
    }

    function closePopup() {
        document.getElementById('popup-detail').classList.add('hidden');
    }

    function showConfirmation() {
        document.getElementById('popup-detail').classList.add('hidden');
        document.getElementById('popup-confirmation').classList.remove('hidden');
    }

    function closeConfirmation() {
        document.getElementById('popup-confirmation').classList.add('hidden');
        document.getElementById('popup-detail').classList.remove('hidden');
    }

    async function confirmPinjam() {
        try {
            if (!selectedBarangId || !selectedPemilikId) {
                throw new Error('Data barang atau pemilik tidak valid.');
            }

            const response = await fetch(`/api/permintaan`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    barang_id: selectedBarangId,
                    pemilik_id: selectedPemilikId,
                    status: 'pending'
                })
            });

            if (!response.ok) {
                throw new Error('Gagal mengirim permintaan peminjaman.');
            }

            alert('Permintaan peminjaman berhasil dikirim!');
            closeConfirmation();
        } catch (error) {
            alert(error.message);
        }
    }
</script>
@endsection