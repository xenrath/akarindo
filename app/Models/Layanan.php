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

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class, "level_id", "id");
    }
}
