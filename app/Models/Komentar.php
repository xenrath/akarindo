<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    // kolom yang dapat diisi pada tabel komentars

    protected $fillable = [
        'tiket_id',
        'pengirim_id',
        'komentar',
        'gambar'
    ];
    
    // relasi dengan model tiket

    public function tiket()
    {
        return $this->belongsTo(Tiket::class);
    }

    // relasi dengan model pengirim

    public function pengirim()
    {
        return $this->belongsTo(User::class);
    }
}
