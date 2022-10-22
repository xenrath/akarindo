<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = [
            'produk' => 'jasa website',
            'user_id' => '1',
            'layanan_id' => '1',
            'url' => 'https://themeselection.com',
            'pedoman' => 'file',
        ];

        Produk::insert($produk);
    }
}
