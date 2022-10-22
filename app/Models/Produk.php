<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk',
        'user_id',
        'layanan_id',
        'url',
        'pedoman',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, "layanan_id", "id");
    }
}
