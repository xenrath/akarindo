<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }

    public function tiket_teknisis()
    {
        return $this->hasMany(Tiket::class, 'teknisi_id', 'id');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function isAdmin()
    {
        if ($this->role == 'admin') {
            return true;
        }
        return false;
    }

    public function isCS()
    {
        if ($this->role == 'cs') {
            return true;
        }
        return false;
    }

    public function isTeknisi()
    {
        if ($this->role == 'teknisi') {
            return true;
        }
        return false;
    }

    public function isClient()
    {
        if ($this->role == 'client' && $this->status) {
            return true;
        }
        return false;
    }
}
