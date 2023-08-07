<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailObrolan extends Model
{
    use HasFactory;

    // kolom yang dapat diisi pada tabel detail_obrolans

    protected $fillable = [
        'obrolan_id',
        'pengirim_id',
        'pesan',
        'gambar',
        'is_read'
    ];

    // relasi satu ke satu dengan model obrolan

    public function obrolan()
    {
        return $this->belongsTo(Obrolan::class);
    }

    // relasi satu ke satu dengan model user

    public function pengirim()
    {
        return $this->belongsTo(User::class);
    }
}
