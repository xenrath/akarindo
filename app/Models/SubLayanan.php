<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubLayanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'layanan_id',
        'nama'
    ];
    
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
