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
                'level_id' => '3'
            ],
            [
                'layanan' => 'Android Development',
                'keterangan' => 'Tertarik memiliki aplikasi sendiri? buat saja sesuai kebutuhanmu, kami akan bantu hingga aplikasi dapat diunduh di App Store (IOS) dan Playstore (Android)',
                'gambar' => 'layanan/android-development.png',
                'level_id' => '3'
            ],
            [
                'layanan' => 'Sofware Development',
                'keterangan' => 'Software yang kami buat kami sesuaikan dengan kebutuhan anda. tidak perlu cemas karena kami akan menyederhanakan setiap tahapan yang menjadi masalah anda.',
                'gambar' => 'layanan/software-development.png',
                'level_id' => '3'
            ],
            [
                'layanan' => 'Digital Marketing',
                'keterangan' => 'Ngiklan sendiri ribet? Tim kami siap membantu memasarkan produk anda dengan taregt yang spesifik dan terukur. laporan kami sajikan secara realtime.',
                'gambar' => 'layanan/digital-marketing.png',
                'level_id' => '1'
            ],
            [
                'layanan' => 'Courses',
                'keterangan' => 'Belajar Teknologi langsung dengan ahlinya, dapatkan ilmu terapan dan studi kasus secara nyata sehingga menghadirkan pengalaman yang tidak didapat dari tempat lainnya.',
                'gambar' => 'layanan/courses.png',
                'level_id' => '2'
            ],
            [
                'layanan' => 'Digital Curriculum Vitae (CV)',
                'keterangan' => 'Buat HRD Perusahaan yang anda lamar tekesima dan biarkan mereka memberikan nilai plus dengan anda melalui diigtal CV (daftar riwayat hidup) online.',
                'gambar' => 'layanan/curriculum-vitae.png',
                'level_id' => '1'
            ],
            [
                'layanan' => 'Pendirian PT',
                'keterangan' => 'Kita juga bisa membantu pendirian usaha anda agar memiliki legalitas usaha. harga murah penuh dengan fasilitas yang dapat anda gunakan secara langsung.',
                'gambar' => 'layanan/company.png',
                'level_id' => '2'
            ],
            [
                'layanan' => 'Desain Grafis',
                'keterangan' => 'Design profesional untuk membuat produk serta calon customer anda melirik anda. Buat magnet dari ilustrasi produk atau jasa yang anda jual bersama akarindo.id',
                'gambar' => 'layanan/design-graph.png',
                'level_id' => '2'
            ],
            [
                'layanan' => 'Social Media Management',
                'keterangan' => 'Sibuk tak ada waktu mengelola media sosial. serahkan semua ke tim kami. caption, foto, design, jadwal tayarang, penargetan, semua kami yang kelola.',
                'gambar' => 'layanan/social-media.png',
                'level_id' => '2'
            ],
        ];

        Layanan::insert($layanans);
    }
}
