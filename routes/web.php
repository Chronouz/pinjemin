<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login'); // Arahkan ke halaman login
});
// Route untuk halaman login Laravel Breeze
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('profil.login'); // Halaman login Laravel Breeze
    })->name('login');
});
Route::get('/register', [AuthController::class, 'showregister'])->name('register.show');
Route::get('/login', [AuthController::class, 'showlogin'])->name('login.show');
Route::post('/login/submit', [AuthController::class, 'submitlogin'])->name('login.submit');

Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/{barang}', [BarangController::class, 'show'])->name('barang.show');

Route::get('/dashboard', function () {
    return redirect()->route('home'); // Arahkan ke halaman dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     // Redirect ke halaman kustom setelah verifikasi
//     return redirect('/home'); // Ganti '/custom-page' dengan route kustom Anda
// })->middleware(['auth', 'signed'])->name('verification.verify');

Route::prefix('api')->group(function () {
    // Endpoint untuk mendapatkan barang berdasarkan kategori
    Route::get('/barang', [BarangController::class, 'getByCategory'])->name('api.barang.category');

    // Endpoint untuk mendapatkan detail barang berdasarkan ID
    Route::get('/barang/{id}', [BarangController::class, 'getById'])->name('api.barang.detail');

    // Endpoint untuk menyimpan permintaan peminjaman
    Route::post('/permintaan', [PermintaanController::class, 'store'])->name('api.permintaan.store');
});

Route::middleware('auth', 'verified')->group(function () {
    // Route::get('/home', [HomepageController::class, 'index'])->name('dashboard');
    Route::get('/home', [HomepageController::class, 'index'])->name('home');
    Route::get('/katalog', [BarangController::class, 'katalog'])->name('katalog');
    Route::get('/aboutus', function () {
        return view('view.aboutus');
    })->name('aboutus');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/profile', [UserController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/search', [BarangController::class, 'search'])->name('search');

    // Profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');

    // Barang Sewa (milik user)
    Route::get('/sewa', [BarangController::class, 'index'])->name('barang.sewa');
    Route::get('/sewa/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/sewa', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/sewa/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/sewa/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/sewa/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

    // Barang Pinjam (yang user pinjam)
    Route::get('/pinjam', [PinjamController::class, 'index'])->name('barang.pinjam');
    Route::post('/pinjam/{id}/return', [PinjamController::class, 'return'])->name('pinjam.return');

    // Permintaan Peminjaman
    Route::post('/permintaan', [PermintaanController::class, 'store'])->name('permintaan.store');
    Route::get('/permintaan', [PermintaanController::class, 'index'])->name('permintaan.index');
    Route::post('/permintaan/{id}/terima', [PermintaanController::class, 'terima'])->name('permintaan.terima');
    Route::post('/permintaan/{id}/tolak', [PermintaanController::class, 'tolak'])->name('permintaan.tolak');
    Route::delete('/permintaan/{id}', [PermintaanController::class, 'destroy'])->name('permintaan.destroy');
    Route::delete('/riwayat/{id}', [RiwayatController::class, 'destroy'])->name('riwayat.destroy');
});

require __DIR__.'/auth.php';

route::get('dashboard/admin',[HomeController::class,'index']);

Route::get('/logout-and-home', function () {
    Auth::logout();
    return redirect('/');
})->name('logout.and.home');