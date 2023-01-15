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
    
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function teknisis()
    {
        return $this->hasMany(User::class);
    }

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }

}
