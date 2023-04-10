<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailObrolan extends Model
{
    use HasFactory;

    protected $fillable = [
        'obrolan_id',
        'pengirim_id',
        'pesan',
    ];

    public function obrolan()
    {
        return $this->belongsTo(Obrolan::class);
    }

    public function pengirim()
    {
        return $this->belongsTo(User::class);
    }
}
