<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Permintaan extends Model
{
    use HasFactory;
    protected $table = 'permintaan';

    protected $fillable = ['barang_id', 'peminjam_id', 'pemilik_id', 'status'];

    public function barang() {
        return $this->belongsTo(Barang::class);
    }

    public function peminjam() {
        return $this->belongsTo(User::class, 'peminjam_id');
    }

    public function pemilik() {
        return $this->belongsTo(User::class, 'pemilik_id');
    }
}
