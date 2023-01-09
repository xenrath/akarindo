<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'client_id',
        'teknisi_id',
        'produk_id',
        'pengaduan',
        'gambar',
        'status',
        'jawaban',
        'tanggal_awal',
        'tanggal_akhir'
    ];
    
    public function client()
    {
        return $this->belongsTo(User::class);
    }

    public function teknisi()
    {
        return $this->belongsTo(User::class);
    }
    
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
