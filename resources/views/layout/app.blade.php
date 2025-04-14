<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pinjemin')</title>
    <link rel="stylesheet" href="{{ asset('css/barang.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-left">
            <div class="logo-circle"></div>
            <h1 class="logo-text">PINJEM<span class="gray">IN</span></h1>
        </div>
        <div class="navbar-center">
            <a href="#">Home</a>
            <a href="#">About us</a>
        </div>
        <div class="navbar-right">
            <i class="icon">🔍</i>
            <i class="icon">✉️</i>
            <div class="avatar-circle"></div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>
</body>
</html>