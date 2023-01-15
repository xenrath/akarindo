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
                'layanan' => 'Web Development',
                'keterangan' => 'Tak perlu lama menunggu Tim kami akan memberikan layanan supercepat dan dukungan SEO yang optimal dari website yang kami buat.',
                'gambar' => 'layanan/web-development.png',
                'level_id' => '3',
            ],
            [
                'layanan' => 'Mobile Development',
                'keterangan' => 'Tertarik memiliki aplikasi sendiri? buat saja sesuai kebutuhanmu, kami akan bantu hingga aplikasi dapat diunduh di App Store (IOS) dan Playstore (Android)',
                'gambar' => 'layanan/android-development.png',
                'level_id' => '3',
            ],
            [
                'layanan' => 'Digital Marketing',
                'keterangan' => 'Ngiklan sendiri ribet? Tim kami siap membantu memasarkan produk anda dengan taregt yang spesifik dan terukur. laporan kami sajikan secara realtime.',
                'gambar' => 'layanan/digital-marketing.png',
                'level_id' => '1',
            ],
            [
                'layanan' => 'Desain Grafis',
                'keterangan' => 'Design profesional untuk membuat produk serta calon customer anda melirik anda. Buat magnet dari ilustrasi produk atau jasa yang anda jual bersama akarindo.id',
                'gambar' => 'layanan/design-graph.png',
                'level_id' => '2',
            ],
        ];

        Layanan::insert($layanans);
    }
}
