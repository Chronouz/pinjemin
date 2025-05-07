@extends('layout.main')

@section('content')
    <section class="py-10 px-6">
        <!-- Navbar Katalog -->
        <div class="bg-orange-100 py-4 px-6 rounded-lg shadow-md mb-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <!-- Dropdown Kategori -->
                <div class="relative">
                    <select id="category-filter" onchange="filterByCategory()"
                        class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded shadow focus:outline-none
                               focus:ring-2 focus:ring-yellow-400 w-full md:w-auto hover:bg-yellow-400 hover:text-black transition-all duration-300">
                        <option value="">Semua Kategori</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Aksesoris">Aksesoris</option>
                        <option value="Peralatan Konstruksi">Peralatan Konstruksi</option>
                        <option value="Pakaian">Pakaian</option>
                    </select>
                </div>

                <!-- Search Bar -->
                <div class="flex items-center gap-2 w-full md:w-auto">
                    <input type="text" id="search-bar" placeholder="Cari barang..."
                        class="border border-gray-300 py-2 px-4 rounded shadow focus:outline-none w-full md:w-96">
                    <button onclick="searchBarang()"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded shadow">
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
                <div class="bg-white rounded-lg shadow-md p-4" data-category="{{ $item->category }}"
                    data-name="{{ strtolower($item->name) }}">
                    <img src="/storage/{{ $item->image_path }}" alt="{{ $item->name }}"
                        class="w-full h-32 object-cover rounded-md mb-4">
                    <h3 class="text-lg font-bold">{{ $item->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $item->description }}</p>
                    <p class="text-sm text-gray-600"><strong>Kategori:</strong> {{ $item->category }}</p>
                    <p class="text-sm text-gray-600"><strong>Harga:</strong> Rp{{ number_format($item->cost, 0, ',', '.') }}
                    </p>
                    <div class="flex justify-between mt-4">
                        <button onclick="showDetail({{ $item->id }})"
                            class="bg-blue-500 text-white px-4 py-2 rounded">Detail</button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Popup Detail Barang -->
    <div id="popup-detail"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden transition-opacity duration-300">
        <div class="bg-white rounded-lg p-6 w-96 shadow-lg transform scale-95 transition-transform duration-300">
            <!-- Close Button -->
            <button onclick="closePopup()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
                ✕
            </button>

            <!-- Popup Header -->
            <div class="flex items-center mb-6">
                <img id="popup-image" src="#" alt="Barang" class="w-16 h-16 object-cover rounded-full mr-4">
                <h2 id="popup-title" class="text-xl font-bold text-gray-800"></h2>
            </div>

            <!-- Popup Content -->
            <div class="grid grid-cols-2 gap-4">
                <div class="text-sm text-gray-600 font-semibold">Deskripsi:</div>
                <div id="popup-description" class="text-sm text-gray-600"></div>

                <div class="text-sm text-gray-600 font-semibold">Harga:</div>
                <div id="popup-price" class="text-sm text-gray-800 font-bold"></div>

                <div class="text-sm text-gray-600 font-semibold">Lokasi:</div>
                <div id="popup-location" class="text-sm text-gray-600 flex items-center">
                    <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                    <span></span>
                </div>

                <div class="text-sm text-gray-600 font-semibold">Kategori:</div>
                <div id="popup-category" class="text-sm text-gray-600 flex items-center">
                    <i class="fas fa-tags text-blue-500 mr-2"></i>
                    <span></span>
                </div>

                <div class="text-sm text-gray-600 font-semibold">Stok:</div>
                <div id="popup-stock" class="text-sm text-gray-600 flex items-center">
                    <i class="fas fa-box text-green-500 mr-2"></i>
                    <span></span>
                </div>

                <div class="text-sm text-gray-600 font-semibold">Kondisi:</div>
                <div id="popup-condition" class="text-sm text-gray-600 flex items-center">
                    <i class="fas fa-info-circle text-yellow-500 mr-2"></i>
                    <span></span>
                </div>

                <div class="text-sm text-gray-600 font-semibold">Status:</div>
                <div id="popup-status" class="text-sm font-semibold"></div>

                <div class="col-span-2">
                    <a id="popup-whatsapp" href="#" target="_blank"
                        class="bg-green-500 text-white px-4 py-2 rounded flex items-center justify-center hover:bg-green-600 transition">
                        <i class="fab fa-whatsapp text-white mr-2"></i> Hubungi via WhatsApp
                    </a>
                </div>
            </div>

            <!-- Popup Footer -->
            <div class="flex justify-between mt-6">
                <button onclick="closePopup()"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                    Kembali
                </button>
                <button id="popup-pinjam-button" onclick="showConfirmation()"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                    Pinjam
                </button>
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
                document.getElementById('popup-price').textContent = `Rp${barang.cost}`;
                document.getElementById('popup-location').textContent = `${barang.location}`;
                document.getElementById('popup-category').textContent = `${barang.category}`;
                document.getElementById('popup-stock').textContent = `${barang.stock}`;
                document.getElementById('popup-condition').textContent = `${barang.condition}`;

                // Tambahkan teks dinamis ke link WhatsApp
                const whatsappText = `Halo, saya tertarik untuk meminjam barang ${barang.name}`;
                const whatsappLink = `${barang.link}?text=${encodeURIComponent(whatsappText)}`;
                document.getElementById('popup-whatsapp').href = whatsappLink;

                // Update status
                const statusElement = document.getElementById('popup-status');
                if (barang.status) {
                    statusElement.textContent = 'Tersedia';
                    statusElement.className = 'text-green-500';
                    document.getElementById('popup-pinjam-button').disabled = false;
                    document.getElementById('popup-pinjam-button').classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    statusElement.textContent = 'Tidak Tersedia';
                    statusElement.className = 'text-red-500';
                    document.getElementById('popup-pinjam-button').disabled = true;
                    document.getElementById('popup-pinjam-button').classList.add('opacity-50', 'cursor-not-allowed');
                }

                // Update gambar barang
                document.getElementById('popup-image').src = `/storage/${barang.image_path}`;

                // Tampilkan popup
                const popup = document.getElementById('popup-detail');
                popup.classList.remove('hidden');
                popup.classList.add('opacity-100', 'scale-100');
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
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
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
