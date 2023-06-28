<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'layanan',
        'keterangan',
        'gambar',
        'level_id'
    ];
    
    // relasi satu ke satu dengan model level

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // relasi satu ke banyak dengan model user

    public function teknisis()
    {
        return $this->hasMany(User::class);
    }

    // relasi satu ke banyak dengan model level

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }

}
