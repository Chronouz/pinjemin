<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;

Route::get('/login', [AuthController::class, 'showlogin'])->name('login.show');
Route::post('/login/submit', [AuthController::class, 'submitlogin'])->name('login.submit');


Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/{barang}', [BarangController::class, 'show'])->name('barang.show');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('dashboard/admin',[HomeController::class,'index']);