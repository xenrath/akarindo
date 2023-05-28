<?php

namespace App\Models;

use Carbon\Carbon;
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
        'tanggal_pengerjaan',
        'bukti',
        'tanggal_akhir'
    ];
    
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function teknisi()
    {
        return $this->belongsTo(User::class, 'teknisi_id', 'id');
    }
    
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }

    public function getTanggalAwalAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_awal'])->translatedFormat('d F Y');
    }

    public function getTanggalPengerjaanAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_pengerjaan'])->translatedFormat('d F Y');
    }

    public function getTanggalAkhirAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_akhir'])->translatedFormat('d F Y');
    }
}
