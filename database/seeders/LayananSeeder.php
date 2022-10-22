<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $layanan = [
            'id' => '1',
            'layanan' => 'layanan etiketing',
            'keterangan' => 'menerima perbaikan dll',
            'gambar' => 'layanan/google.jpg',
            'level_id' => '1'
        ];

        Layanan::insert($layanan);
    }
}
