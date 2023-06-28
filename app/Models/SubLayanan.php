<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubLayanan extends Model
{
    use HasFactory;

    // kolom yang dapat diisi pada tabel sublayanans

    protected $fillable = [
        'layanan_id',
        'nama'
    ];

    // relasi satu ke satu dengan model layanan
    
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
