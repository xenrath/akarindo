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
                'pertanyaan' => 'Apa itu EHR Helpdesk?',
                'jawaban' => 'EHR Helpdesk merupakan sistem informasi manajemen untuk menangani keluhan layanan pelanggan terkait masalah layanan yang disediakan oleh perusahaan.'
            ],
            [
                'pertanyaan' => 'Bagaimana Cara Melakukan Keluhan?',
                'jawaban' => 'Cara melakukan keluhan komplain, pelanggan dapat masuk sesuai dengan akses yang diberikan dan masuk ke menu buat pengaduan. Lakukan pengaduan sesuai dengan masalah serta berikan dokumentasi foto untuk membantu mempercepat layanan keluhan.'
            ],
            [
                'pertanyaan' => ' Laporan apa sajakah yang tersedia di EHR Helpdesk?',
                'jawaban' => 'Laporan keluhan yang tersedia mengenai Web Development, Mobile Development, Digital Marketing, Desain Grafis. Keluhan disesuaikan dengan produk yang sudah melakukan proses pembelian produk dari perusahaan.'
            ],
            [
                'pertanyaan' => 'Bagaimana jika tidak dapat masuk ke akun saya di website ini?',
                'jawaban' => ' Terdapat beberapa kendala seperti kesalahan dalam menulis password, masalah server hosting, koneksi internet buruk, membersihkan cache browser Anda, atau menghubungi customer service  website melaui live chat untuk memeriksa apakah ada masalah pada server.  .'
            ],
            [
                'pertanyaan' => ' Website sangat lambat dalam memuat halaman?',
                'jawaban' => ' Jika saat mengakses website sangat lambat terdapat beberapa faktor masalah dengan server hosting, atau kesalahan pada kode website. Anda dapat mencoba memperbaiki masalah ini dengan mengoptimalkan gambar dan video, memperbarui kode website, atau memperbarui server hosting anda.'
            ],
            [
                'pertanyaan' => ' Cara merubah kata sandi akun pengaduan website?',
                'jawaban' => 'Untuk merubah kata sandi akun dapat dilihat pada menu update profile, kemudian tulis kembali kata sandi yang baru.'
            ],
            [
                'pertanyaan' => ' Bagaimana meningkatkan keamanan produk berbasis website?',
                'jawaban' => 'Dalam meningkakan keamanan produk baik berbasis website dengan meningkatkan keamanan website, seperti menggunakan SSL atau HTTPS, memperbarui sistem manajemen konten (CMS) Anda secara teratur atau menggunakan plugin keamanan untuk melindungi website Anda dari serangan. Anda juga bisa mengajukan aduan layanan pada menu buat pengaduan.'
            ],
            [
                'pertanyaan' => ' Siapa yang dapat saya hubungi jika mengalami masalah dengan website ini?',
                'jawaban' => ' Jika Anda memerlukan bantuan teknis dengan website Anda, Anda dapat menghubungi Customer Service pada menu Live Chat.'
            ],
            [
                'pertanyaan' => ' Apa yang harus saya lakukan jika saya tidak dapat menemukan informasi yang saya butuhkan di website ini?',
                'jawaban' => ' Jika tidak menemukan informasi yang anda butuhkan pada website ini, Anda juga bisa mengajukan aduan layanan pada menu buat pengaduan .'
            ],
            [
                'pertanyaan' => 'Bagaimana cara memperbarui informasi pribadi di website ini?',
                'jawaban' => ' Untuk memperbaharui informasi pribadi dapat dilakukan pada menu update profile.'
            ],
            [
                'pertanyaan' => 'Bagaimana cara mengakses Live Chat dengan Customer Service?',
                'jawaban' => ' Anda dapat masuk ke menu obrolan untuk mengakses live chat dengan customer service.'
            ],
            [
                'pertanyaan' => ' Bagaimana cara merespons Live Chat dengan Teknisi?',
                'jawaban' => ' Untuk merespons live chat dengan tekisi anda dapat melakukan obrolan jika layanan keluhan sudah masuk ke menu diproses, kemudian teknisi akan menghubungi anda .'
            ],
            [
                'pertanyaan' => 'Apakah ada nomor telepon atau alamat email yang bisa saya hubungi jika saya memiliki keluhan tentang layanan Anda?',
                'jawaban' => ' Jika anda mempunyai keluhan mengenai layanan, Anda dapat masuk ke menu obrolan untuk mengakses live chat dengan customer service.'
            ],
            [
                'pertanyaan' => ' Apa jenis informasi yang perlu saya sertakan saat mengajukan keluhan?',
                'jawaban' => 'Jenis informasi yang harus disertakan dalam mengajukan keluhandapat ditulis pada kolom deskripsi serta dapat menambahkan gambar untuk mempercepat proses pengerjaan .'
            ],
            [
                'pertanyaan' => 'Bagaimana cara saya mengajukan keluhan jika saya tidak puas dengan layanan yang saya terima?',
                'jawaban' => 'Untuk mengajukan keluhan layanan kembali anda dapat memilih menu buat pengaduan kembali.'
            ],
            [
                'pertanyaan' => 'Berapa lama waktu yang dibutuhkan untuk menanggapi dan menyelesaikan keluhan saya?',
                'jawaban' => 'Waktu yang dibutuhkan dalam penyelesaikan keluhan disesuaikan berdasarkan level kesulitan produk .'
            ],
            [
                'pertanyaan' => 'Apa yang harus saya lakukan jika keluhan saya tidak diselesaikan dengan baik?',
                'jawaban' => 'Anda dapat melakkan pengajuan keluhan kembali pada menu Buat Pengaduan.'
            ],
            [
                'pertanyaan' => ' Apa kebijakan perusahaan Anda dalam menangani keluhan pelanggan?',
                'jawaban' => 'Perusahaan akan memberikan pelayanan keluhan semaksimal mungkin sesuai dengan keinginan pelanggan.'
            ],
            [
                'pertanyaan' => 'Siapa yang akan menangani keluhan saya, dan bagaimana saya bisa menghubungi mereka?',
                'jawaban' => 'Pelayanan keluhan akan ditangani oleh customer service yang nantikan akan dilakukan mapping ke teknisi sesuai dengan produk yang pelanggan pesan.'
            ],
            [
                'pertanyaan' => 'Apakah ada bentuk kompensasi atau penggantian yang tersedia jika keluhan saya terbukti valid?',
                'jawaban' => 'Bentuk kompensasi yang akan diberikan akan diberikan oleh perusahaan berupa pemberian potongan discount dalam pembayaran.'
            ],
            [
                'pertanyaan' => 'Apa yang harus saya lakukan jika saya tidak dapat mengunduh atau menginstal aplikasi ini di perangkat saya?',
                'jawaban' => ' Pastikan perangkat Anda memenuhi persyaratan sistem minimum, periksa koneksi internet Anda, membersihkan cache dan data aplikasi, dan hubungi layanan helpdesk atau support dari penyedia aplikasi jika masalah tetap terjadi.Jika mengalami kesulitan, Anda juga bisa mengajukan aduan layanan pada menu buat pengaduan .'
            ],
            [
                'pertanyaan' => 'Mengapa aplikasi ini terus-menerus menutup sendiri ketika saya mencoba menggunakannya?',
                'jawaban' => ' Aplikasi bisa menutup sendiri karena berbagai faktor seperti adanya bug atau kesalahan di dalam aplikasi, perangkat tidak memenuhi persyaratan minimum aplikasi, atau terdapat masalah dengan koneksi internet atau perangkat itu sendiri. Jika mengalami kesulitan, Anda juga bisa mengajukan aduan layanan pada menu buat pengaduan.'
            ],
            [
                'pertanyaan' => 'Apakah ada pembaruan atau perbaikan yang sedang dilakukan untuk aplikasi ini, dan kapan akan tersedia?',
                'jawaban' => '  Pemberharuan untuk aplikasi mobile akan langsung tersedia melalui aplikasi app store maupun play store .'
            ],
            [
                'pertanyaan' => 'Apa yang harus saya lakukan jika saya kehilangan data atau informasi penting di aplikasi ini?',
                'jawaban' => ' Jika Anda kehilangan data atau informasi penting di aplikasi mobile, segera hubungi layanan helpdesk atau support dengan  mengajukan aduan layanan pada menu buat pengaduan .'
            ],
            [
                'pertanyaan' => 'Apakah ada nomor telepon atau alamat email yang dapat saya hubungi jika saya mengalami masalah dengan aplikasi ini?',
                'jawaban' => 'Anda dapat melakukan komunikasi melalui obrolan live chat dengan customer service.'
            ],
            [
                'pertanyaan' => 'Mengapa desain UI/UX yang saya terima tidak sesuai dengan kebutuhan dan preferensi saya?',
                'jawaban' => 'Desain UI/UX yang tidak sesuai dengan kebutuhan dan preferensi bisa terjadi karena kurangnya komunikasi dan pemahaman yang jelas antara pelanggan dan desainer UI/UX, serta kurangnya penjabaran atau spesifikasi kebutuhan dari pelanggansebelum desainer memulai proyek. Segera hubungi layanan helpdesk atau support dengan mengajukan aduan layanan pada menu buat pengaduan.'
            ],
            [
                'pertanyaan' => ' Siapa yang akan menangani permintaan atau keluhan saya terkait dengan desain UI/UX, dan bagaimana saya bisa menghubungi mereka?',
                'jawaban' => ' Pelayanan keluhan akan ditangani oleh customer service yang nantikan akan dilakukan mapping ke teknisi sesuai dengan produk yang pelanggan pesan.'
            ],
            [
                'pertanyaan' => ' Apakah ada jaminan atau garansi terhadap kualitas atau kinerja desain UI/UX yang saya terima?',
                'jawaban' => ' Tergantung pada perjanjian antara klien dan desainer, ada atau tidaknya jaminan atau garansi terhadap kualitas atau kinerja desain UI/UX yang diberikan dapat bervariasi. Jika mengalami kesulitan, Anda juga bisa mengajukan aduan layanan pada menu buat pengaduan.'
            ],
            [
                'pertanyaan' => 'Mengapa sistem point of sale (POS) saya tidak dapat melakukan transaksi atau membaca kartu kredit dengan benar?',
                'jawaban' => 'Sistem point of sale (POS) yang tidak dapat melakukan transaksi atau membaca kartu kredit dengan benar dapat disebabkan oleh beberapa faktor seperti masalah koneksi jaringan, perangkat keras yang rusak, atau masalah dengan terminal pembayaran atau kartu kredit itu sendiri. Jika mengalami kesulitan, Anda juga bisa mengajukan aduan layanan pada menu buat pengaduan.'
            ],
            [
                'pertanyaan' => 'Bagaimana saya dapat memperbaiki masalah yang berkaitan dengan printer struk POS yang tidak berfungsi dengan baik?',
                'jawaban' => 'Untuk memperbaiki masalah printer struk POS yang tidak berfungsi dengan baik, Anda dapat memeriksa koneksi kabel, membersihkan atau mengganti kertas printer, memperbarui atau menginstal ulang driver printer, Segera hubungi layanan helpdesk atau support dengan  mengajukan aduan layanan pada menu buat pengaduan.'
            ],

            [
                'pertanyaan' => 'Bagaimana saya dapat menghubungi helpdesk untuk meminta bantuan teknis jika saya mengalami masalah dengan sistem POS?',
                'jawaban' => 'Untuk meminta bantuan mengenai masalah dengan sistem POS anda dapat berkomunikasi melalui obrolan live chat dengan customer service, anda juga bisa mengajukan aduan layanan pada menu buat pengaduan.'
            ],
            [
                'pertanyaan' => 'Apa yang harus saya lakukan jika sistem POS saya tidak dapat terhubung dengan jaringan internet atau perangkat lain?',
                'jawaban' => 'Jika sistem POS tidak dapat terhubung dengan jaringan internet atau perangkat lain, Anda dapat memeriksa koneksi jaringan dan konfigurasi jaringan, memperbarui atau memperbaiki perangkat lunak sistem POS. Anda juga bisa mengajukan aduan layanan pada menu buat pengaduan.'
            ],

            [
                'pertanyaan' => 'Apa yang harus saya lakukan jika saya kehilangan data atau informasi transaksi yang penting di sistem POS saya?',
                'jawaban' => ' Segera hubungi layanan helpdesk atau support dengan  mengajukan aduan layanan pada menu buat pengaduan.'
            ],
            [
                'pertanyaan' => ' Bagaimana saya dapat memperbarui atau meng-upgrade sistem POS saya untuk memenuhi kebutuhan bisnis yang berubah?',
                'jawaban' => ' Untuk memperbarui atau meng-upgrade sistem POS, akan langsung tersedia pada App Store maupun Play Store. Anda juga bisa mengajukan aduan layanan pada menu buat pengaduan.'
            ],
            [
                'pertanyaan' => 'Siapa yang akan menangani permintaan atau keluhan saya terkait dengan sistem POS, dan bagaimana saya bisa menghubungi mereka?',
                'jawaban' => ' Untuk meminta bantuan mengenai masalah dengan sistem POS anda dapat berkomunikasi melalui obrolan live chat dengan customer service, anda juga bisa mengajukan aduan layanan pada menu buat pengaduan .'
            ],
            [
                'pertanyaan' => ' Apakah ada garansi atau dukungan teknis yang tersedia untuk sistem POS yang saya beli?',
                'jawaban' => ' Garansi dan dukungan teknis untuk sistem POS dapat bervariasi tergantung pada kesepkatan saat awal proses pembelian sistem.'
            ],
            [
                'pertanyaan' => 'Bagaimana cara memperbaiki masalah yang terkait dengan peringkat SEO atau tampilan situs web di mesin pencari?',
                'jawaban' => 'Untuk memperbaiki masalah terkait dengan peringkat SEO atau tampilan situs web di mesin pencari, Anda dapat melakukan optimasi konten dan struktur situs web, memperbarui atau memperbaiki metadata, backlink dan sitemap, serta mengikuti panduan dan praktik terbaik SEO yang dianjurkan oleh mesin pencari atau ahli SEO.'
            ],
            [
                'pertanyaan' => 'Apa yang harus  dilakukan jika situs web saya mengalami serangan malware atau hacking?',
                'jawaban' => 'Segera hubungi layanan helpdesk atau support dengan  mengajukan aduan layanan pada menu buat pengaduan.'
            ],
            [
                'pertanyaan' => 'Bagaimana cara mentransfer website ke hostingan yang baru?',
                'jawaban' => 'Untuk mentransfer website Anda ke hosting baru, Anda dapat mengikuti langkah-langkah seperti membuat salinan cadangan website Anda, mengunggah salinan cadangan ke hosting baru, dan mengonfigurasi nama domain Anda untuk mengarah ke hosting baru. Jika mengalami kesulitan, Anda juga bisa mengajukan aduan layanan pada menu buat pengaduan .'
            ],
            [
                'pertanyaan' => 'Bagaimana cara melakukan setup website baru?',
                'jawaban' => 'Untuk melakukan setup website baru, langkah pertama yang harus Anda lakukan adalah memilih platform manajemen konten (CMS) yang akan digunakan, seperti WordPress atau Drupal. Setelah itu, Anda perlu memilih penyedia hosting dan mengonfigurasi nama domain Anda. Setelah itu, Anda dapat menginstal CMS dan memulai membangun website Anda.Jika mengalami kesulitan, Anda juga bisa mengajukan aduan layanan pada menu buat pengaduan .'
            ],
            [
                'pertanyaan' => 'Bagaimana cara memulihkan website dari salinan cadangan?',
                'jawaban' => 'Jika website Anda rusak atau terkena serangan malware, Anda dapat memulihkannya dari salinan cadangan yang dibuat sebelumnya.Jika mengalami kesulitan, Anda juga bisa mengajukan aduan layanan pada menu buat pengaduan.'
            ],
            [
                'pertanyaan' => 'Bagaimana cara membeli domain baru?',
                'jawaban' => ' Untuk membeli domain baru, Anda juga bisa mengajukan aduan layanan pada menu buat pengaduan .'
            ],
            [
                'pertanyaan' => 'Bagaimana cara memperpanjang domain saya?',
                'jawaban' => ' Untuk memperpanjang domain Anda, Anda perlu memperbarui informasi pembayaran di akun Anda.Anda juga bisa mengajukan aduan layanan pada menu buat pengaduan .'
            ],
        ];

        Faq::insert($faqs);
    }
}
