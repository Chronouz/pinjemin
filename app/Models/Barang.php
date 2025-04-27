<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    
    protected $fillable = [
        'user_id',
        'image_path',
        'name',
        'description',
        'cost',
        'location',
        'category',
        'stock',
        'condition',
        'link',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pinjam()
    {
        return $this->hasMany(Pinjam::class);
    }
    public function permintaan()
    {
        return $this->hasMany(Permintaan::class);
    }

    public function updateStatus($status)
    {
        $this->update(['status' => $status]);
    }

    public function peminjam()
    {
        return $this->hasOneThrough(
            User::class,
            Permintaan::class,
            'barang_id', // Foreign key di tabel permintaan
            'id',        // Foreign key di tabel users
            'id',        // Local key di tabel barang
            'peminjam_id' // Local key di tabel permintaan
        )->where('permintaan.status', 'diterima'); // Hanya peminjaman yang diterima
    }
}
