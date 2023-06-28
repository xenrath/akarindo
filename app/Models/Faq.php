<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    // kolom yang dapat diisi pada tabel faqs

    protected $fillable = [
        'pertanyaan',
        'jawaban',
    ];
}
