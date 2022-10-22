<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    use HasFactory;
    
    protected $fillable = [
        'level',
        'pengerjaan',
        'perbaikan'
    ];

    public function layanan()
    {
        return $this->hasMany(Layanan::class);
    }
}
