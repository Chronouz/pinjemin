<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Judul --}}
    <title>Pinjemin</title>

    <!-- Ikon Load -->
    <link rel="icon" href="{{ asset('images/core/icon.ico') }}" />

    @vite('resources/css/app.css')
    @vite('resources/css/nav.css')
    @vite('resources/css/homepage.css')
    @vite('resources/js/layout.js')
    @vite('resources/js/whatsapp.js')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-[#fef7f0] min-h-screen">
    {{-- Header --}}
    <header class="nav fixed top-0 left-0 w-full bg-white shadow-md z-50">
        {{-- Logo --}}
        <li>
            <div class="logo">
                <a href="{{ url('/home') }}">
                    <span class="text-pinjem">Pinjem</span><span class="text-in">In</span>
                </a>
            </div>
        </li>

        {{-- Menu --}}
        <li>
            <div class="bodyparent">
                <ul>
                    <li><a class="active" href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('katalog') }}">Katalog</a></li>
                    <li><a href="{{ route('aboutus') }}">About Us</a></li>
                </ul>
            </div>
        </li>

        {{-- Ikon dan Foto Profil --}}
        <li>
            <div class="button flex items-center space-x-4">
                <!-- Tombol Dark Mode -->
                <button id="darkModeToggle" class="text-black text-xl" aria-label="Toggle Dark Mode">
                    <i class="fas fa-moon"></i>
                </button>

                <!-- Tombol Email -->
                <a href="{{ route('permintaan.index') }}"
                    class="text-black text-xl hover:text-yellow-500 transition-colors duration-300" aria-label="Email">
                    <i class="fas fa-envelope"></i>
                </a>

                {{-- Foto Profil --}}
                <div class="relative">
                    <img src="{{ $authUser->profil?->image_path ? asset('storage/' . $authUser->profil->image_path) : asset('assets/img/default-avatar.png') }}"
                        alt="Avatar" class="w-10 h-10 rounded-full cursor-pointer" id="photoprofile"
                        onclick="toggleDropdown()">

                    {{-- Popup Menu --}}
                    <div id="dropdownMenu"
                        class="hidden absolute right-0 mt-2 w-56 bg-white border rounded shadow-lg z-50 transform scale-95 opacity-0 transition-all duration-300">
                        {{-- Profil dan Nama --}}
                        <div class="px-4 py-2 border-b">
                            <div class="flex items-center gap-2">
                                <img src="{{ $authUser->profil?->image_path ? asset('storage/' . $authUser->profil->image_path) : asset('assets/img/default-avatar.png') }}"
                                    class="w-10 h-10 rounded-full">
                                <div>
                                    {{-- Nama Pengguna dan Email --}}
                                    <p class="font-semibold text-gray-700">{{ $authUser->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $authUser->email }}</p>
                                </div>
                            </div>
                        </div>
                        {{-- List Menu --}}
                        <a href="{{ route('profil') }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</a>
                        <a href="{{ route('barang.sewa') }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Barang di Sewa</a>
                        <a href="{{ route('barang.pinjam') }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Barang Pinjam</a>
                        <a href="{{ route('permintaan.index') }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Permintaan</a>
                        <a href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="block px-4 py-2 text-center text-white bg-orange-500 hover:bg-orange-600 rounded">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </li>
    </header>

    {{-- Search Bar --}}
    <div id="searchBar" class="hidden bg-gray-100 shadow-md p-4 fixed top-16 left-0 w-full z-40">
        <div class="flex items-center space-x-4">
            <input type="text" placeholder="Search..."
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Search
            </button>
        </div>
    </div>

    {{-- Main Content --}}
    <main class="pt-16">
        {{-- Flash Message --}}
        @if (session('success'))
            <div class="bg-green-500 text-white px-4 py-3 rounded mb-4 max-w-7xl mx-auto">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white px-4 py-3 rounded mb-4 max-w-7xl mx-auto">
                {{ session('error') }}
            </div>
        @endif

        {{-- Konten --}}
        @yield('content')
    </main>
</body>

</html>
