<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomepageController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    return redirect()->route('login'); // Arahkan ke halaman login
});
// Route untuk halaman login Laravel Breeze
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login'); // Halaman login Laravel Breeze
    })->name('login');
});
Route::get('/register', [AuthController::class, 'showregister'])->name('register.show');
Route::get('/login', [AuthController::class, 'showlogin'])->name('login.show');
Route::post('/login/submit', [AuthController::class, 'submitlogin'])->name('login.submit');


Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/{barang}', [BarangController::class, 'show'])->name('barang.show');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('home'); // Arahkan ke halaman dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    // Redirect ke halaman kustom setelah verifikasi
    return redirect('/home'); // Ganti '/custom-page' dengan route kustom Anda
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::middleware('auth', 'verified')->group(function () {
    // Route::get('/home', [HomepageController::class, 'index'])->name('dashboard');
    Route::get('/home', [HomepageController::class, 'index'])->name('home');
    Route::get('/aboutus', function () {
        return view('view.aboutus');
    })->name('aboutus');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('dashboard/admin',[HomeController::class,'index']);

