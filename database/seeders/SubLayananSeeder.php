<?php

namespace Database\Seeders;

use App\Models\SubLayanan;
use Illuminate\Database\Seeder;

class SubLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sublayanans = [
            [
                'layanan_id' => '1',
                'nama' => 'Website Bank'
            ],
            [
                'layanan_id' => '1',
                'nama' => 'Smart Kolektor'
            ],
            [
                'layanan_id' => '1',
                'nama' => 'Smart Marketing'
            ],
            [
                'layanan_id' => '1',
                'nama' => 'Literasi & Edukasi'
            ],
            [
                'layanan_id' => '1',
                'nama' => 'Raport Karyawan'
            ],
            [
                'layanan_id' => '1',
                'nama' => 'E-Library'
            ],
            [
                'layanan_id' => '1',
                'nama' => 'Management Report'
            ],
            [
                'layanan_id' => '1',
                'nama' => 'Smart Notaris'
            ],
            [
                'layanan_id' => '1',
                'nama' => 'Inventory & Maintenance'
            ],
            [
                'layanan_id' => '2',
                'nama' => 'UMKM Binaan'
            ],
            [
                'layanan_id' => '2',
                'nama' => 'E-Library'
            ],
            [
                'layanan_id' => '2',
                'nama' => 'Smart Kolektor'
            ],
            [
                'layanan_id' => '2',
                'nama' => 'Smart Khazanah'
            ],
            [
                'layanan_id' => '2',
                'nama' => 'Payment Gateway'
            ],
            [
                'layanan_id' => '2',
                'nama' => 'Smart Notaris'
            ],
            [
                'layanan_id' => '3',
                'nama' => 'Analisa Keuangan'
            ],
            [
                'layanan_id' => '3',
                'nama' => 'Point of Sale (POS)'
            ],
            [
                'layanan_id' => '3',
                'nama' => 'Promosi Produk UMKM'
            ],
            [
                'layanan_id' => '4',
                'nama' => 'Desain UI/UX Website'
            ],
            [
                'layanan_id' => '4',
                'nama' => 'Desain UI/UX Mobile'
            ],
            [
                'layanan_id' => '4',
                'nama' => 'Desain Banner Website'
            ],
        ];

        SubLayanan::insert($sublayanans);
    }
}
