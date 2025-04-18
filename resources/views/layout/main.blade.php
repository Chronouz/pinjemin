<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PinjemIn')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> {{-- CSS utama --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    @stack('styles') {{-- Untuk CSS tambahan jika diperlukan --}}
</head>
<body>
    <!-- Header -->
    <header id="main-header">
        <div class="titlelogo">
            <img src="{{ asset('assets/img/logo.png') }}" id="logo" class="logo-img">
            <div class="title">
                <span class="pinjem">PINJEM</span><span class="in">IN</span>
            </div>
        </div>

        <div class="centernav">
            <nav>
                <ul>
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/aboutus') }}">About Us</a></li>
                </ul>
            </nav>
        </div>
        
        <div class="farrightnav">
            <nav>
                <ul>
                    <i class="fa fa-search bw-icon"></i>  <!-- Ikon Search -->
                    <i class="fa fa-envelope bw-icon"></i>  <!-- Ikon Mail -->  
                    <img src="{{ asset('assets/img/logo.png') }}" id="photoprofile" class="pp-img">                  
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content') {{-- Konten spesifik halaman --}}
    </main>

    <!-- Footer (Opsional) -->
    <footer>
        {{-- Tambahkan footer jika diperlukan --}}
    </footer>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>