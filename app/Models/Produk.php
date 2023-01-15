<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'client_id',
        'sublayanan_id',
        'url',
        'pedoman',
    ];

    public function client()
    {
        return $this->belongsTo(User::class);
    }

    public function sublayanan()
    {
        return $this->belongsTo(SubLayanan::class);
    }
}
