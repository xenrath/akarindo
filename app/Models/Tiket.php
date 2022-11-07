<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'user_id',
        'product_id',
        'pengaduan',
        'status',
        'tanggal_awal',
        'tanggal_akhir'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function product()
    {
        return $this->belongsTo(User::class);
    }
}
