<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    
    // kolom yang dapat diisi pada tabel levels

    protected $fillable = [
        'nama',
        'lama',
    ];

    // relasi satu ke banyak dengan model layanan

    public function layanans()
    {
        return $this->hasMany(Layanan::class);
    }
}
