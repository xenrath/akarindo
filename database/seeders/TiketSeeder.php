<?php

namespace Database\Seeders;

use App\Models\Tiket;
use Illuminate\Database\Seeder;

class TiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tikets = [
            [
                'id' => '1',
                'kode' => '2210170001',
                'user_id' => '2',
                'produk_id' => '1',
                'pengaduan' => 'Sistem informasi rental mobil mengalami error dan banyak bug',
                'status' => 'Menunggu',
                'tanggal_awal' => '18-10-2022'
            ],
            [
                'id' => '2',
                'kode' => '2210170002',
                'user_id' => '2',
                'produk_id' => '2',
                'pengaduan' => 'Website jasa loundry tidak dapat digunakan untuk memesan',
                'status' => 'Menunggu',
                'tanggal_awal' => '18-10-2022'
            ],
            [
                'id' => '3',
                'kode' => '2210170003',
                'user_id' => '3',
                'produk_id' => '3',
                'pengaduan' => 'Aplikasi penjualan lahan tanah banyak mengalami bug',
                'status' => 'Menunggu',
                'tanggal_awal' => '18-10-2022'
            ],
            [
                'id' => '4',
                'kode' => '2210170004',
                'user_id' => '3',
                'produk_id' => '4',
                'pengaduan' => 'Perbaikan sistem penyewaan lapangan fulsal',
                'status' => 'Menunggu',
                'tanggal_awal' => '18-10-2022'
            ],
            [
                'id' => '5',
                'kode' => '2210170005',
                'user_id' => '4',
                'produk_id' => '5',
                'pengaduan' => 'Pendirian PT Hidup Jaya',
                'status' => 'Menunggu',
                'tanggal_awal' => '18-10-2022'
            ],
            [
                'id' => '6',
                'kode' => '2210170006',
                'user_id' => '4',
                'produk_id' => '6',
                'pengaduan' => 'Pembuatan desain grafis untuk rumah dan gedung',
                'status' => 'Menunggu',
                'tanggal_awal' => '18-10-2022'
            ],
        ];

        Tiket::insert($tikets);
    }
}
