<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // kolom yang dapat diisi pada tabel users

    protected $fillable = [
        'kode',
        'nama',
        'role',
        'email',
        'telp',
        'foto',
        'alamat',
        'password',
        'layanan_id'
    ];

    // relasi satu ke banyak dengan model produk
    
    public function produks()
    {
        return $this->hasMany(Produk::class);
    }

    // relasi satu ke banyak dengan model tiket

    public function tiket_teknisis()
    {
        return $this->hasMany(Tiket::class, 'teknisi_id', 'id');
    }

    // relasi satu ke satu dengan model layanan

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    // cek role admin

    public function isAdmin()
    {
        if ($this->role == 'admin') {
            return true;
        }
        return false;
    }

    // cek role cs

    public function isCS()
    {
        if ($this->role == 'cs') {
            return true;
        }
        return false;
    }

    // cek role teknisi

    public function isTeknisi()
    {
        if ($this->role == 'teknisi') {
            return true;
        }
        return false;
    }

    // cek role client

    public function isClient()
    {
        if ($this->role == 'client' && $this->status) {
            return true;
        }
        return false;
    }
}
