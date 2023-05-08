<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiket_id',
        'pengirim_id',
        'komentar',
        'gambar'
    ];
    
    public function tiket()
    {
        return $this->belongsTo(Tiket::class);
    }

    public function pengirim()
    {
        return $this->belongsTo(User::class);
    }
}
