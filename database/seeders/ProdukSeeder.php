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
        $produks = [
            [
                'id' => '1',
                'nama' => 'Sistem Informasi Rental Mobil',
                'client_id' => '4',
                'layanan_id' => '1',
                'url' => 'https://sirenmo.com',
                'pedoman' => 'produk/siremo.pdf',
            ],
            [
                'id' => '2',
                'nama' => 'Sistem Informasi Jasa Laundry',
                'client_id' => '5',
                'layanan_id' => '1',
                'url' => 'https://sijalo.com',
                'pedoman' => 'produk/sijalo.pdf',
            ],
            [
                'id' => '3',
                'nama' => 'Sistem Informasi Penjualan Lahan Tanah',
                'client_id' => '4',
                'layanan_id' => '2',
                'url' => 'https://siplata.com',
                'pedoman' => 'produk/siplata.pdf',
            ],
            [
                'id' => '4',
                'nama' => 'Sistem Informasi Penyewaan Lapangan Futsal',
                'client_id' => '5',
                'layanan_id' => '2',
                'url' => 'https://siplafu.com',
                'pedoman' => 'produk/siplafu.pdf',
            ],
            [
                'id' => '5',
                'nama' => 'Pendirian PT Hidup Jaya',
                'client_id' => '4',
                'layanan_id' => '6',
                'url' => 'https://hidupjaya.com',
                'pedoman' => 'produk/hidupjaya.pdf',
            ],
            [
                'id' => '6',
                'nama' => 'Pembuatan Desain Rumah',
                'client_id' => '5',
                'layanan_id' => '8',
                'url' => null,
                'pedoman' => null,
            ],
        ];

        Produk::insert($produks);
    }
}
