@extends('layout.main')

@section('content')
<section class="bg-gradient-to-b from-orange-100 to-white py-16 px-6">
    <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-4xl font-bold text-orange-600 mb-6">Tentang Kami</h1>
        <p class="text-lg text-gray-700 leading-relaxed">
            PinjemIn adalah platform inovatif yang mempermudah Anda untuk meminjam dan menyewakan barang dengan mudah dan cepat.
        </p>
        <p class="text-lg text-gray-700 leading-relaxed mt-4">
            Visi kami adalah memberikan kemudahan akses kepada semua orang untuk meminjam atau menyewakan barang dengan aman dan terpercaya.
        </p>
    </div>

    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <!-- Card 1 -->
        <div class="bg-white shadow-lg rounded-lg p-6 text-center transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <div class="flex justify-center mb-4">
                <i class="fas fa-handshake text-orange-500 text-5xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Aman dan Terpercaya</h3>
            <p class="text-gray-600">
                Kami memastikan semua transaksi dilakukan dengan aman dan transparan untuk memberikan pengalaman terbaik.
            </p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white shadow-lg rounded-lg p-6 text-center transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <div class="flex justify-center mb-4">
                <i class="fas fa-clock text-orange-500 text-5xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Cepat dan Mudah</h3>
            <p class="text-gray-600">
                Dengan antarmuka yang sederhana, Anda dapat meminjam atau menyewakan barang hanya dalam beberapa langkah.
            </p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white shadow-lg rounded-lg p-6 text-center transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <div class="flex justify-center mb-4">
                <i class="fas fa-globe text-orange-500 text-5xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Jangkauan Luas</h3>
            <p class="text-gray-600">
                Platform kami tersedia untuk semua orang di berbagai lokasi, memungkinkan Anda untuk terhubung dengan lebih banyak pengguna.
            </p>
        </div>
    </div>

    <div class="mt-16 text-center">
        <a href="{{ url('/home') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transition duration-300">
            Kembali ke Beranda
        </a>
    </div>
</section>
@endsection