<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obrolan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiket_id',
        'cs_id',
        'client_id',
    ];

    public function cs()
    {
        return $this->belongsTo(User::class);
    }
    
    public function client()
    {
        return $this->belongsTo(User::class);
    }

    public function detail_obrolans()
    {
        return $this->hasMany(DetailObrolan::class);
    }
}
