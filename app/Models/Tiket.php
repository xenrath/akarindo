<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    // kolom yang dapat diisi pada tabel tikets

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
    
    // relasi satu ke satu dengan model user

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    // relasi satu ke satu dengan model user

    public function teknisi()
    {
        return $this->belongsTo(User::class, 'teknisi_id', 'id');
    }

    // relasi satu ke satu dengan model produk
    
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    // relasi satu ke banyak dengan model komentar

    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }

    // mengubah format tanggal awal

    public function getTanggalAwalAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_awal'])->translatedFormat('d F Y');
    }

    // mengubah format tanggal pengerjaan

    public function getTanggalPengerjaanAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_pengerjaan'])->translatedFormat('d F Y');
    }

    // mengubah format tanggal akhir

    public function getTanggalAkhirAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_akhir'])->translatedFormat('d F Y');
    }
}
