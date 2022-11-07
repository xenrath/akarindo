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
        $layanans = [
            [
                'id' => '1',
                'layanan' => 'Web Development',
                'keterangan' => 'menerima pembuatan web dan perbaikan web',
                'gambar' => 'layanan/jasawebsite.jpeg',
                'level_id' => '3'
            ],
            [
                'id' => '2',
                'layanan' => 'Android Development',
                'keterangan' => 'menerima pembuatan mobile dan perbaikan mobile',
                'gambar' => 'layanan/jasamobile.jpeg',
                'level_id' => '3'
            ],
            [
                'id' => '3',
                'layanan' => 'Sofware Development',
                'keterangan' => 'menerima jasa pembuatan web maupun mobile',
                'gambar' => 'layanan/sofware.jpeg',
                'level_id' => '3'
            ],
            [
                'id' => '4',
                'layanan' => 'Digital Marketing',
                'keterangan' => 'Menerima jasa promosi produk dll',
                'gambar' => 'layanan/digitalmarketing.jpeg',
                'level_id' => '1'
            ],
            [
                'id' => '5',
                'layanan' => 'Courses',
                'keterangan' => 'menerima kursus pembuatan website',
                'gambar' => 'layanan/courses.jpeg',
                'level_id' => '2'
            ],
            [
                'id' => '6',
                'layanan' => 'Digital Curriculum Vitae (CV)',
                'keterangan' => 'menerima jasa pembuatan cv',
                'gambar' => 'layanan/cv.png',
                'level_id' => '1'
            ],
            [
                'id' => '7',
                'layanan' => 'Pendirian PT',
                'keterangan' => 'menerima jasa bantu pendirian PT',
                'gambar' => 'layanan/pendirianpt.jpeg',
                'level_id' => '3'
            ],
            [
                'id' => '8',
                'layanan' => 'Desain Grafis',
                'keterangan' => 'menerima pembuatan desain grafis',
                'gambar' => 'layanan/desain.jpeg',
                'level_id' => '2'
            ],
        ];

        Layanan::insert($layanans);
    }
}
