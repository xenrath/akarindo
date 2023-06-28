<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obrolan extends Model
{
    use HasFactory;

    // kolom yang dapat diisi pada tabel obrolans

    protected $fillable = [
        'tiket_id',
        'cs_id',
        'client_id',
    ];

    // relasi satu ke satu dengan model user

    public function cs()
    {
        return $this->belongsTo(User::class);
    }

    // relasi satu ke satu dengan model user
    
    public function client()
    {
        return $this->belongsTo(User::class);
    }

    // relasi satu ke banyak dengan model detail obrolan

    public function detail_obrolans()
    {
        return $this->hasMany(DetailObrolan::class);
    }
}
