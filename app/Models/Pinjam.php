<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Pinjam extends Model
{
    use HasFactory;
    protected $table = 'pinjam';

    protected $fillable = [
        'user_id',
        'barang_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function permintaan()
    {
        return $this->hasOne(Permintaan::class, 'barang_id', 'barang_id')
            ->where(function ($query) {
                $query->whereColumn('permintaan.peminjam_id', 'pinjam.user_id'); // Cocokkan peminjam_id dengan user_id
            });
    }
}
