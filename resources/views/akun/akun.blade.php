<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil Akun</title>
    <link rel="stylesheet" href="{{ asset('css/akun.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="title">Profil Saya</h1>

        <div class="profile-section">
            <div class="profile-pic">
                <img src="{{ asset('img/profile.png') }}" alt="Foto Profil">
                <button class="ubah-foto">Ubah Foto</button>
            </div>

            <div class="profile-info">
                <label>Nama</label>
                <input type="text" value="Lyen Septryanti" readonly>

                <label>Asal Kota</label>
                <input type="text" value="Indralaya" readonly>

                <label>Email</label>
                <input type="text" value="lyen@example.com" readonly>

                <label>Nomor Telepon</label>
                <input type="text" value="0821......" readonly>
            </div>
        </div>

        <div class="button-section">
            <button class="btn-primary">Edit Profil</button>
            <button class="btn-secondary">Kembali</button>
        </div>
    </div>
</body>
</html>