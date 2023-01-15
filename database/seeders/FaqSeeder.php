<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faqs = [
            [
                'pertanyaan' => 'Apa itu EHR System?',
                'jawaban' => 'EHR System adalah sistem HR dan Tata Kelola karyawan berbasis cloud yang bertujuan untuk membantu perusahaan menyederhanakan dan mengotomatiskan proses HR secara end-to-end dan penerapan tata kelola karyawan demi terwujudnya Good Corporate Governance (GCG).'
            ],
            [
                'pertanyaan' => 'Apa itu EHR Ticketing?',
                'jawaban' => 'HER Ticketing merupakan sistem informasi manajemen untuk menangani keluhan layanan pelanggan terkait masalah layanan yang disediakan oleh perusahaan.'
            ],
            [
                'pertanyaan' => 'Bagaimana Cara Melakukan Keluhan?',
                'jawaban' => 'Cara melakukan keluhan komplain, pelanggan dapat masuk sesuai dengan akses yang diberikan dan masuk ke menu buat pengaduan. Lakukan pengaduan sesuai dengan masalah serta berikan dokumentasi foto untuk membantu mempercepat layanan keluhan.'
            ],
        ];

        Faq::insert($faqs);
    }
}
