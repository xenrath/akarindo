<?php

namespace Database\Seeders;

use App\Models\SubChatbot;
use Illuminate\Database\Seeder;

class SubChatbotSeeder extends Seeder
{
    public function run()
    {
        $subchatbots = [
            [
                'chatbot_id' => '1',
                'pertanyaan' => 'Pengertian EHR System',
                'jawaban' => 'EHR System adalah sistem HR dan Tata Kelola karyawan berbasis cloud yang bertujuan untuk membantu perusahaan menyederhanakan dan mengotomatiskan proses HR secara end-to-end dan penerapan tata kelola karyawan demi terwujudnya Good Corporate Governance (GCG).'
            ],
            [
                'chatbot_id' => '1',
                'pertanyaan' => 'Pengertian EHR Helpdesk',
                'jawaban' => 'EHR Helpdesk merupakan sistem informasi manajemen untuk menangani keluhan layanan pelanggan terkait masalah layanan yang disediakan oleh perusahaan.'
            ],
            [
                'chatbot_id' => '2',
                'pertanyaan' => 'Cara membuat keluhan',
                'jawaban' => 'Cara melakukan keluhan komplain, pelanggan dapat masuk sesuai dengan akses yang diberikan dan masuk ke menu buat pengaduan. Lakukan pengaduan sesuai dengan masalah serta berikan dokumentasi foto untuk membantu mempercepat layanan keluhan.'
            ],
            [
                'chatbot_id' => '3',
                'pertanyaan' => 'Tidak dapat masuk ke akun',
                'jawaban' => 'Terdapat beberapa kendala seperti kesalahan dalam menulis password, masalah server hosting, koneksi internet buruk, membersihkan cache browser Anda, atau menghubungi customer service website melaui live chat untuk memeriksa apakah ada masalah pada server.'
            ],
            [
                'chatbot_id' => '3',
                'pertanyaan' => 'Website sangat lambat',
                'jawaban' => 'Jika saat mengakses website sangat lambat terdapat beberapa faktor masalah dengan server hosting, atau kesalahan pada kode website. Anda dapat mencoba memperbaiki masalah ini dengan mengoptimalkan gambar dan video, memperbarui kode website, atau memperbarui server hosting anda.'
            ],
            [
                'chatbot_id' => '3',
                'pertanyaan' => 'Cara merubah kata sandi',
                'jawaban' => 'Untuk merubah kata sandi akun dapat dilihat pada menu update profile, kemudian tulis kembali kata sandi yang baru.
                '
            ],
            [
                'chatbot_id' => '3',
                'pertanyaan' => 'Meningkatkan keamanan produk',
                'jawaban' => 'Dalam meningkakan keamanan produk baik berbasis website dengan meningkatkan keamanan website, seperti menggunakan SSL atau HTTPS, memperbarui sistem manajemen konten (CMS) Anda secara teratur atau menggunakan plugin keamanan untuk melindungi website Anda dari serangan. Anda juga bisa mengajukan aduan layanan pada menu buat pengaduan.
                '
            ],
            [
                'chatbot_id' => '3',
                'pertanyaan' => 'Memperbarui informasi pribadi',
                'jawaban' => 'Untuk memperbaharui informasi pribadi dapat dilakukan pada menu update profile.
                '
            ],
        ];

        SubChatbot::insert($subchatbots);
    }
}
