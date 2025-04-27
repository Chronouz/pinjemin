<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'riwayat';

    protected $fillable = [
        'barang_id',
        'pemilik_id',
        'peminjam_id',
        'pesan',
    ];

    // Relasi ke model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    // Relasi ke model User untuk peminjam
    public function peminjam()
    {
        return $this->belongsTo(User::class, 'peminjam_id');
    }

    // Relasi ke model User untuk pemilik
    public function pemilik()
    {
        return $this->belongsTo(User::class, 'pemilik_id');
    }
}