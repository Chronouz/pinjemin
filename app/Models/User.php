<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'usertype',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function profil()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function pinjam()
    {
        return $this->hasMany(Pinjam::class);
    }
    
    public function permintaanMasuk() {
        return $this->hasMany(Permintaan::class, 'pemilik_id');
    }
    
    public function permintaanKeluar() {
        return $this->hasMany(Permintaan::class, 'peminjam_id');
    }

    // Event deleting untuk menghapus data terkait
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            // Hapus data profil terkait
            $user->profil()->delete();

            // Hapus data barang terkait
            $user->barang()->delete();

            // Hapus data pinjam terkait
            $user->pinjam()->delete();

            // Hapus data permintaan masuk terkait
            $user->permintaanMasuk()->delete();

            // Hapus data permintaan keluar terkait
            $user->permintaanKeluar()->delete();
        });
    }
    
}
