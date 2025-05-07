<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pinjemin - Login</title>

    <!-- Ikon Load -->
    <link rel="icon" href="{{ asset('images/core/icon.ico') }}" />

    <!-- Font & Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    @vite('resources/css/login.css')



</head>

<body class="relative min-h-screen bg-[#1f2a2e]">

    <!-- Background image -->
    <img src="{{ asset('images/login-bg.jpg') }}" alt="Background Image"
        class="absolute inset-0 w-full h-full object-cover brightness-50" />

    <div class="relative z-10">
        <!-- Navbar -->
        <header
            class="nav fixed top-0 left-0 w-full flex justify-between items-center px-6 py-4 bg-black bg-opacity-60">
            <div class="logo">
                <a href="javascript:void(0);" id="logo-pinjemin">
                    <span class="text-pinjem">Pinjem</span><span class="text-in">In</span>
                </a>
            </div>
            <nav>
                <ul class="flex space-x-6">
                    <li>
                        <a href="#tentang-kami"
                            class="text-white text-sm font-semibold hover:text-yellow-400 scroll-to-section">
                            Tentang Kami
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="button flex space-x-4">
                <button
                    class="RegisterBtn bg-yellow-400 text-black font-semibold rounded-full px-4 py-2 hover:bg-yellow-300"
                    onclick="showContainer('signup')">
                    Sign Up
                </button>
                <button
                    class="LoginBtn border border-white text-white font-semibold rounded-full px-4 py-2 hover:bg-white hover:text-black"
                    onclick="showContainer('login')">
                    Log In
                </button>
            </div>
        </header>

        {{-- <!-- Email Verification Notification -->
        @if (session('status') == 'verification-link-sent')
            <div
                class="fixed top-16 left-0 w-full bg-yellow-400 text-black px-6 py-3 flex justify-between items-center z-50">
                <span>Email Verifikasi Telah Dikirim</span>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">
                        Resend Email
                    </button>
                </form>
            </div>
        @endif --}}

        <!-- Main Content -->
        <main class="relative flex items-center justify-start min-h-screen text-white px-6">
            <div class="max-w-lg">
                <h1 class="font-extrabold text-4xl md:text-5xl leading-tight">
                    Pinjem Barang Jadi Gampang, Hanya di PinjemIn!
                </h1>
                <p class="text-sm mt-3">
                    Apa pun kebutuhanmu, tinggal pinjem. Mudah dan cepat!
                </p>
                <div class="mt-8 flex space-x-4">
                    <button
                        class="bg-[#e5ce57] text-[#1f2a2e] font-semibold rounded-full px-6 py-2 text-sm hover:bg-yellow-400 transition"
                        onclick="showContainer('signup')">
                        Sign Up
                    </button>
                    <button
                        class="border border-white text-white font-normal rounded-full px-6 py-2 text-sm hover:bg-white hover:text-[#1f2a2e] transition"
                        onclick="showContainer('login')">
                        Log In
                    </button>
                </div>
            </div>

            <!-- Form Container -->
            <div id="form-container"
                class="hidden fixed top-[15%] right-40 w-[30%] h-auto bg-white bg-opacity-90 shadow-lg transform translate-x-full transition-transform duration-500 ease-in-out z-50 rounded-3xl border-4 border-gradient-to-r from-yellow-400 via-red-400 to-pink-400 p-6">
                <button class="text-gray-500 hover:text-gray-800 absolute top-4 right-4"
                    onclick="hideContainer()">✕</button>

                <!-- Verify Email Form -->
                <div id="verify-email-form" class="hidden">
                    <h2 class="text-2xl font-bold mb-4 text-black">Verifikasi Email Anda</h2>
                    <p class="text-sm text-gray-600 mb-4">
                        Terima kasih telah mendaftar! Sebelum memulai, harap verifikasi alamat email Anda dengan
                        mengklik tautan yang baru saja kami kirimkan ke email Anda. Jika Anda tidak menerima email, kami
                        akan dengan senang hati mengirim ulang.
                    </p>

                    @if (session('status') == 'verification-link-sent')
                        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                            Tautan verifikasi baru telah dikirim ke alamat email Anda.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit"
                            class="w-full bg-yellow-400 text-black font-semibold rounded-lg px-4 py-2 hover:bg-yellow-300">
                            Kirim Ulang Email Verifikasi
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}" class="mt-4">
                        @csrf
                        <button type="submit"
                            class="w-full bg-gray-300 text-black font-semibold rounded-lg px-4 py-2 hover:bg-gray-400">
                            Logout
                        </button>
                    </form>
                </div>

                <!-- Sign Up Form -->
                <div id="signup-form" class="hidden">
                    <h2 class="text-2xl font-bold mb-4 text-black">Sign Up</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2 text-black">Nama</label>
                            <input type="text" name="name"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-black focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2 text-black">Email</label>
                            <input type="email" name="email"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-black focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2 text-black">Password</label>
                            <input type="password" name="password"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-black focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2 text-black">Confirm Password</label>
                            <input type="password" name="password_confirmation"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-black focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                required>
                        </div>
                        <button type="submit"
                            class="w-full bg-yellow-400 text-black font-semibold rounded-lg px-4 py-2 hover:bg-yellow-300">
                            Sign Up
                        </button>
                    </form>
                </div>

                <!-- Log In Form -->
                <div id="login-form" class="hidden">
                    @if (session('status'))
                        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2 class="text-2xl font-bold mb-4 text-black">Log In</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2 text-black">Email</label>
                            <input type="email" name="email"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-black focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2 text-black">Password</label>
                            <input type="password" name="password"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-black focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                required>
                        </div>
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" name="remember" id="remember" class="mr-2">
                            <label for="remember" class="text-sm text-black">Remember Me</label>
                        </div>
                        <button type="submit"
                            class="w-full bg-yellow-400 text-black font-semibold rounded-lg px-4 py-2 hover:bg-yellow-300">
                            Log In
                        </button>
                    </form>
                </div>
            </div>
        </main>

        <!-- Tentang Kami Section -->
        <section id="tentang-kami" class="bg-[#fef7e0] text-gray-900 py-20 px-6 flex items-center justify-center">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-xl font-bold mb-4">Tentang Kami</h2>
                <p class="text-sm leading-relaxed mb-4">
                    Pinjemin adalah platform yang mempermudah proses pinjam-meminjam barang antara pengguna.
                    Kami percaya bahwa berbagi adalah cara terbaik untuk mengurangi pemborosan dan meningkatkan
                    efisiensi.
                </p>
                <p class="text-sm leading-relaxed mb-4">
                    Dengan Pinjemin, Anda dapat menemukan barang yang Anda butuhkan tanpa harus membelinya.
                    Selain itu, Anda juga dapat menyewakan barang yang jarang digunakan untuk mendapatkan penghasilan
                    tambahan.
                </p>
                <p class="text-sm leading-relaxed">
                    Bergabunglah dengan komunitas kami dan jadilah bagian dari perubahan menuju gaya hidup yang lebih
                    berkelanjutan.
                </p>
            </div>
        </section>
    </div>
    <!-- Custom JavaScript -->
    @vite('resources/js/login.js')

    <!-- Custom JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (request()->is('verify-email'))
                showContainer('verify-email');
            @endif

            @if (session('showVerifyEmail') || (isset($showVerifyEmail) && $showVerifyEmail))
                showContainer('verify-email');
            @endif

            @if (session('showLogin'))
                showContainer('login'); // Buka form login jika session showLogin ada
            @endif

            @if (session('showLogin') && session('status'))
                // Tampilkan pesan status jika session showLogin dan status ada
                const statusMessage = document.createElement('div');
                statusMessage.className = 'fixed top-16 left-1/2 transform -translate-x-1/2 bg-green-100 text-green-800 px-4 py-2 rounded shadow-lg z-50';
                statusMessage.innerText = "{{ session('status') }}";
                document.body.appendChild(statusMessage);

                // Hapus pesan setelah beberapa detik
                setTimeout(() => {
                    statusMessage.remove();
                }, 5000);
            @endif
        });

        let clickCount = 0; // Variabel untuk menghitung jumlah klik

        document.getElementById('logo-pinjemin').addEventListener('click', function() {
            clickCount++; // Tambah jumlah klik setiap kali logo diklik

            if (clickCount === 3) {
                // Arahkan ke route /admin/login setelah 3 kali klik
                window.location.href = '/admin/login';
            }
        });
    </script>
</body>

</html>
