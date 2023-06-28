<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // kolom yang dapat diisi pada tabel produks

    protected $fillable = [
        'nama',
        'client_id',
        'sublayanan_id',
        'url',
        'pedoman',
    ];

    // relasi satu ke satu dengan model user

    public function client()
    {
        return $this->belongsTo(User::class);
    }

    // relasi satu ke satu dengan model sublayanan

    public function sublayanan()
    {
        return $this->belongsTo(SubLayanan::class);
    }
}
