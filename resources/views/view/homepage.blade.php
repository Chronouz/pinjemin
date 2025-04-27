@extends('layout.main')

@section('content')
    <!-- Page View 1 -->
    <section class="hero relative h-screen bg-cover bg-center"
        style="background-image: url('{{ asset('images/home-bg.jpg') }}');">
        <div class="absolute inset-0 grid grid-cols-5 gap-0">
            <div class="bg-black bg-opacity-40"></div>
            <div class="bg-black bg-opacity-60"></div>
            <div class="bg-black bg-opacity-40"></div>
            <div class="bg-black bg-opacity-60"></div>
            <div class="bg-black bg-opacity-40"></div>
        </div>

        <div class="relative z-10 max-w-3xl text-white text-left pl-20 pt-20">
            <h1 class="text-6xl md:text-8xl font-bold mb-4 leading-tight">Pinjam <br> Barang dengan Mudah!</h1>
            <p class="text-lg md:text-xl mb-6">Pinjemin menyediakan akses bagi seluruh pengguna untuk meminjam maupun
                menyewakan barang.</p>
            <a href="{{ route('katalog') }}"
                class="btn bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg inline-flex items-center">
                Jelajahi Katalog <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>

    <!-- Page View 2 -->
    <section id="page-view-2" class="min-h-screen bg-[#fef7f0] py-10 px-6 relative transition-all duration-500 ease-in-out">
        <div class="absolute inset-0 bg-black bg-opacity-40 hidden" id="background-overlay"></div>
        <div id="dynamic-content" class="absolute inset-0 flex items-center justify-center text-white text-center hidden">
            <div class="max-w-lg">
                <h2 id="dynamic-title" class="text-4xl font-bold mb-4"></h2>
                <p id="dynamic-description" class="text-lg"></p>
            </div>
        </div>
        <!-- Popular Category Section -->
        <section class="flex flex-col md:flex-row px-4 md:px-8 py-12 md:py-20">
            {{-- Title and Button --}}
            <div class="relative z-10 w-full md:max-w-md">
                <p class="text-teal-600 italic text-sm md:text-base mb-1">
                    our most
                </p>
                <h2 class="text-3xl md:text-4xl font-bold mb-4 rainbow-text">
                    <span>P</span><span>o</span><span>p</span><span>u</span><span>l</span><span>a</span><span>r</span>
                    <span> </span>
                    <span>C</span><span>a</span><span>t</span><span>e</span><span>g</span><span>o</span><span>r</span><span>y</span>
                </h2>
                <a href="{{ route('katalog') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white text-xs md:text-sm font-medium uppercase tracking-wide px-4 py-2 rounded inline-block">
                    <span>
                        Jelajahi Katalog Barang
                    </span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            {{-- Card Kategori --}}
            <div class="flex flex-wrap justify-between items-end w-full mt-8 md:mt-0 gap-4">
                <!-- Card 1 - Elektronik -->
                <div class="w-36 md:w-48 relative z-30 shadow-lg -mb-4 transform transition-transform duration-300 hover:scale-105 cursor-pointer"
                    onclick="changeView('{{ asset('images/background/card1-bg.png') }}'); loadCategory('Elektronik')">
                    <div class="w-full h-56 bg-cover bg-center rounded-lg"
                        style="background-image: url('{{ asset('images/background/card1.jpg') }}');">
                        <div
                            class="absolute inset-0 flex flex-col justify-end p-3 text-xs font-light italic text-white bg-black bg-opacity-50 rounded-lg">
                            <p>Kategori:</p>
                            <p class="font-semibold">Elektronik</p>
                            <p class="mt-1">Kamera, Bor Elektrik, dll</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 - Aksesoris -->
                <div class="w-36 md:w-48 relative z-20 shadow-lg mb-4 transform transition-transform duration-300 hover:scale-105 cursor-pointer"
                    onclick="changeView('{{ asset('images/background/card2-bg.png') }}'); loadCategory('Aksesoris')">
                    <div class="w-full h-56 bg-cover bg-center rounded-lg"
                        style="background-image: url('{{ asset('images/background/card2.jpg') }}');">
                        <div
                            class="absolute inset-0 flex flex-col justify-end p-3 text-xs font-light italic text-white bg-black bg-opacity-50 rounded-lg">
                            <p>Kategori:</p>
                            <p class="font-semibold">Aksesoris</p>
                            <p class="mt-1">Riasan Pengantin, Atribut Cosplay, dll</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 - Peralatan Konstruksi -->
                <div class="w-36 md:w-48 relative z-10 shadow-lg -mb-4 transform transition-transform duration-300 hover:scale-105 cursor-pointer"
                    onclick="changeView('{{ asset('images/background/card3-bg.png') }}'); loadCategory('Peralatan Konstruksi')">
                    <div class="w-full h-56 bg-cover bg-center rounded-lg"
                        style="background-image: url('{{ asset('images/background/card3.jpg') }}');">
                        <div
                            class="absolute inset-0 flex flex-col justify-end p-3 text-xs font-light italic text-white bg-black bg-opacity-50 rounded-lg">
                            <p>Kategori:</p>
                            <p class="font-semibold">Peralatan Konstruksi</p>
                            <p class="mt-1">Palu, Gergaji, Tangga Lipat, dll</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 - Pakaian -->
                <div class="w-36 md:w-48 relative z-10 shadow-lg -mb-4 transform transition-transform duration-300 hover:scale-105 cursor-pointer"
                    onclick="changeView('{{ asset('images/background/card4-bg.png') }}'); loadCategory('Pakaian')">
                    <div class="w-full h-56 bg-cover bg-center rounded-lg"
                        style="background-image: url('{{ asset('images/background/card4.jpg') }}');">
                        <div
                            class="absolute inset-0 flex flex-col justify-end p-3 text-xs font-light italic text-white bg-black bg-opacity-50 rounded-lg">
                            <p>Kategori:</p>
                            <p class="font-semibold">Pakaian</p>
                            <p class="mt-1">Setelan Cosplay, Baju Daerah, Baju Pengantin, dll</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Barang Cards -->
        <div id="barang-container" class="grid grid-cols-1 md:grid-cols-5 gap-4 mt-8 hidden">
            <!-- Barang cards will be dynamically loaded here -->
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
            <a id="popup-whatsapp" href="#" target="_blank" class="text-blue-500 underline mb-4 block">Hubungi via
                WhatsApp</a>
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
@endsection

<script>
    let selectedBarangId = null;
    let selectedPemilikId = null;

    function changeView(imageUrl, title, description) {
        const pageView2 = document.getElementById('page-view-2');
        const overlay = document.getElementById('background-overlay');
        const dynamicContent = document.getElementById('dynamic-content');
        const dynamicTitle = document.getElementById('dynamic-title');
        const dynamicDescription = document.getElementById('dynamic-description');

        // Update background image
        pageView2.style.transition = 'background-image 0.5s ease-in-out';
        pageView2.style.backgroundImage = `url('${imageUrl}')`;
        pageView2.style.backgroundSize = 'cover'; // Ensure the background covers the entire area
        pageView2.style.backgroundRepeat = 'no-repeat'; // Prevent background repetition

        // Update dynamic content
        dynamicTitle.textContent = title;
        dynamicDescription.textContent = description;

        // Show overlay and content
        overlay.classList.remove('hidden');
        dynamicContent.classList.remove('hidden');
    }

    async function loadCategory(category) {
        const container = document.getElementById('barang-container');
        container.innerHTML = ''; // Clear previous content
        container.classList.remove('hidden');

        const response = await fetch(`/api/barang?category=${category}`);
        const data = await response.json();

        if (data.length === 0) {
            // Tampilkan pesan jika tidak ada barang
            const message = document.createElement('div');
            message.className = 'col-span-5 text-center text-gray-500';
            message.textContent = `Tidak ada barang dengan kategori "${category}".`;
            container.appendChild(message);
            return;
        }

        data.forEach(barang => {
            const card = document.createElement('div');
            card.className = 'card';
            card.innerHTML = `
            <img src="/storage/${barang.image_path}" alt="${barang.name}" class="w-full h-32 object-cover rounded-md mb-4">
            <h3 class="text-lg font-bold">${barang.name}</h3>
            <p class="text-sm text-gray-600">${barang.description}</p>
            <button onclick="showDetail(${barang.id})" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Detail</button>
        `;
            container.appendChild(card);
        });
    }

    async function showDetail(id) {
        try {
            const response = await fetch(`/api/barang/${id}`);
            if (!response.ok) {
                throw new Error('Gagal memuat data barang.');
            }

            const barang = await response.json();

            // Simpan ID barang dan pemilik untuk digunakan di fungsi konfirmasi
            selectedBarangId = barang.id;
            selectedPemilikId = barang.user_id; // Pastikan kolom user_id ada di database

            // Tampilkan data barang di popup detail
            document.getElementById('popup-title').textContent = barang.name;
            document.getElementById('popup-description').textContent = barang.description;
            document.getElementById('popup-price').textContent = `Harga: ${barang.cost}`;
            document.getElementById('popup-location').textContent = `Lokasi: ${barang.location}`;
            document.getElementById('popup-category').textContent = `Kategori: ${barang.category}`;
            document.getElementById('popup-stock').textContent = `Stok: ${barang.stock}`;
            document.getElementById('popup-condition').textContent = `Kondisi: ${barang.condition}`;
            document.getElementById('popup-whatsapp').href = barang.link;
            document.getElementById('popup-status').textContent =
                `Status: ${barang.status ? 'Tersedia' : 'Tidak Tersedia'}`;

            // Tampilkan popup detail
            document.getElementById('popup-detail').classList.remove('hidden');
        } catch (error) {
            alert(error.message);
        }
    }

    function closePopup() {
        const popupDetail = document.getElementById('popup-detail');
        popupDetail.classList.add('hidden');
    }

    function showConfirmation() {
        const popupDetail = document.getElementById('popup-detail');
        const popupConfirmation = document.getElementById('popup-confirmation');

        // Tutup popup detail
        popupDetail.classList.add('hidden');

        // Tampilkan popup konfirmasi
        if (popupConfirmation) {
            popupConfirmation.classList.remove('hidden');
        }
    }

    function closeConfirmation() {
        const popupDetail = document.getElementById('popup-detail');
        const popupConfirmation = document.getElementById('popup-confirmation');

        // Tutup popup konfirmasi
        popupConfirmation.classList.add('hidden');

        // Tampilkan kembali popup detail
        popupDetail.classList.remove('hidden');
    }

    async function confirmPinjam() {
        try {
            if (!selectedBarangId || !selectedPemilikId) {
                throw new Error('Data barang atau pemilik tidak valid.');
            }

            const response = await fetch(`${window.location.origin}/api/permintaan`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    barang_id: selectedBarangId,
                    pemilik_id: selectedPemilikId,
                    peminjam_id: {{ Auth::id() }},
                    status: 'pending'
                })
            });

            if (!response.ok) {
                throw new Error('Gagal mengirim permintaan peminjaman.');
            }

            alert('Permintaan peminjaman berhasil dikirim!');
            closeConfirmation();
            closePopup();
        } catch (error) {
            alert(error.message);
        }
    }
</script>
