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
                'nama' => 'Website Bank BPR Eleska Artha',
                'client_id' => '10',
                'sublayanan_id' => '1',
                'url' => 'https://www.bpreleskaartha.com/',
                'pedoman' => 'produk/Website BPR Eleska Artha.pdf',
            ],
            [
                'nama' => 'UMKM Binaan Eleska Artha',
                'client_id' => '10',
                'sublayanan_id' => '10',
                'url' => 'https://www.bpreleskaartha.com/',
                'pedoman' => 'produk/UMKM Binaan BPR Eleska Artha.pdf',
            ],
            [
                'nama' => 'Poin Of Sale BPR Eleska Artha',
                'client_id' => '10',
                'sublayanan_id' => '17',
                'url' => 'https://www.bpreleskaartha.com/',
                'pedoman' => 'produk/POS BPR Eleska Artha.pdf',
            ],
            [
                'nama' => 'Desain Website BPR Eleska Artha',
                'client_id' => '10',
                'sublayanan_id' => '19',
                'url' => 'https://www.bpreleskaartha.com/',
                'pedoman' => 'produk/UIUX Web BPR Eleska Artha.pdf',
            ],
            [
                'nama' => 'Desain Mobile BPR Eleska Artha',
                'client_id' => '10',
                'sublayanan_id' => '20',
                'url' => 'https://www.bpreleskaartha.com/',
                'pedoman' => 'produk/UIUX Mobile BPR Eleska Artha.pdf',
            ],
            [
                'nama' => 'Website Bank BPR Insumo Sumberarto',
                'client_id' => '11',
                'sublayanan_id' => '1',
                'url' => 'https://bprbisa.co.id/',
                'pedoman' => 'produk/Website Bank BPR Insumo.pdf',
            ],
            [
                'nama' => 'Payment Gateway BPR Insumo Sumberarto',
                'client_id' => '11',
                'sublayanan_id' => '14',
                'url' => 'https://bprbisa.co.id/',
                'pedoman' => 'produk/Payment Gateway BPR Insumo.pdf',
            ],
            [
                'nama' => 'Poin Of Sale BPR Insumo Sumberarto',
                'client_id' => '11',
                'sublayanan_id' => '17',
                'url' => 'https://bprbisa.co.id/',
                'pedoman' => 'produk/POS BPR Insumo.pdf',
            ],
            [
                'nama' => 'Desain Website BPR Insumo Sumberarto',
                'client_id' => '11',
                'sublayanan_id' => '19',
                'url' => 'https://bprbisa.co.id/',
                'pedoman' => 'produk/UIUX Web BPR Insumo.pdf',
            ],
            [
                'nama' => 'Desain Mobile BPR Insumo Sumberarto',
                'client_id' => '11',
                'sublayanan_id' => '20',
                'url' => 'https://bprbisa.co.id/',
                'pedoman' => 'produk/UIUX Mobile BPR Insumo.pdf',
            ],
            [
                'nama' => 'Website Bank BPR Taruna Adidaya Santosa',
                'client_id' => '12',
                'sublayanan_id' => '1',
                'url' => 'https://www.bprtaruna.com/',
                'pedoman' => 'produk/Website BPR Taruna.pdf',
            ],
            [
                'nama' => 'Desain Website BPR Taruna Adidaya Santosa',
                'client_id' => '12',
                'sublayanan_id' => '19',
                'url' => 'https://www.bprtaruna.com/',
                'pedoman' => 'produk/Website BPR Taruna.pdf',
            ],
            [
                'nama' => 'Website Bank BPR Mekar Nugraha',
                'client_id' => '13',
                'sublayanan_id' => '1',
                'url' => 'https://www.mekarnugraha.com/',
                'pedoman' => 'produk/Website BPR Mekar Nugraha.pdf',
            ],
            [
                'nama' => 'Desain Website Bank BPR Mekar Nugraha',
                'client_id' => '13',
                'sublayanan_id' => '19',
                'url' => 'https://www.mekarnugraha.com/',
                'pedoman' => 'produk/Website BPR Mekar Nugraha.pdf',
            ],
            [
                'nama' => 'Website Bank BPR Surya Kencana',
                'client_id' => '14',
                'sublayanan_id' => '1',
                'url' => 'https://banksuryakencana.com/',
                'pedoman' => 'produk/Website BPR Surya Kencana.pdf',
            ],
            [
                'nama' => 'Desain Website Bank BPR Surya Kencana',
                'client_id' => '14',
                'sublayanan_id' => '19',
                'url' => 'https://banksuryakencana.com/',
                'pedoman' => 'produk/Website BPR Surya Kencana.pdf',
            ],

            [
                'nama' => 'Website Bank BPR BKK Temanggung',
                'client_id' => '15',
                'sublayanan_id' => '1',
                'url' => 'https://bprbkktemanggung.co.id/',
                'pedoman' => 'produk/Website BPR BKK Temanggung.pdf',
            ],

            [
                'nama' => 'Desain Website Bank BPR BKK Temanggung',
                'client_id' => '15',
                'sublayanan_id' => '19',
                'url' => 'https://bprbkktemanggung.co.id/',
                'pedoman' => 'produk/Website BPR BKK Temanggung.pdf',
            ],
            [
                'nama' => 'Website Bank BPR Bahtera Artha Jaya',
                'client_id' => '16',
                'sublayanan_id' => '1',
                'url' => 'https://bankbaja.com/ ',
                'pedoman' => 'produk/Website BPR Bahtera Artha.pdf',
            ],
            [
                'nama' => 'Desain Website Bank BPR Bahtera Artha Jaya',
                'client_id' => '16',
                'sublayanan_id' => '19',
                'url' => 'https://bankbaja.com/ ',
                'pedoman' => 'produk/Website BPR Bahtera Artha.pdf',
            ],
            [
                'nama' => 'Website Bank BPR SMS',
                'client_id' => '17',
                'sublayanan_id' => '1',
                'url' => 'https://www.bprsms.co.id/',
                'pedoman' => 'produk/Website Bank BPR SMS.pdf',
            ],
            [
                'nama' => 'Desain Website Bank BPR SMS',
                'client_id' => '17',
                'sublayanan_id' => '19',
                'url' => 'https://www.bprsms.co.id/',
                'pedoman' => 'produk/Website Bank BPR SMS.pdf',
            ],
            [
                'nama' => 'Website Bank BPR PHM',
                'client_id' => '18',
                'sublayanan_id' => '1',
                'url' => 'https://bprphm.com/',
                'pedoman' => 'produk/Website Bank BPR PHM.pdf',
            ],
            [
                'nama' => 'Desain Website Bank BPR PHM',
                'client_id' => '18',
                'sublayanan_id' => '19',
                'url' => 'https://bprphm.com/',
                'pedoman' => 'produk/Website Bank BPR PHM.pdf',
            ],
            [
                'nama' => 'Website Job Street ayokerja.co',
                'client_id' => '19',
                'sublayanan_id' => '3',
                'url' => 'https://ayokerja.co/',
                'pedoman' => 'produk/Website ayokerja.co.pdf',
            ],
            [
                'nama' => 'Desain Website Job Street ayokerja.co',
                'client_id' => '19',
                'sublayanan_id' => '19',
                'url' => 'https://ayokerja.co/',
                'pedoman' => 'produk/Website ayokerja.co.pdf',
            ],
            [
                'nama' => 'Website Company Profile Kurnia Makmur',
                'client_id' => '20',
                'sublayanan_id' => '3',
                'url' => 'https://www.kurniamakmur.com/',
                'pedoman' => 'produk/Company Profile Kurnia Makmur.pdf',
            ],
            [
                'nama' => 'Desain Website Kurnia Makmur',
                'client_id' => '20',
                'sublayanan_id' => '19',
                'url' => 'https://www.kurniamakmur.com/',
                'pedoman' => 'produk/Company Profile Kurnia Makmur.pdf',
            ],
            [
                'nama' => 'Aplikasi POS Kurnia Makmur',
                'client_id' => '20',
                'sublayanan_id' => '17',
                'url' => 'https://www.kurniamakmur.com/',
                'pedoman' => 'produk/Company Profile Kurnia Makmur.pdf',
            ],
            [
                'nama' => 'Website Bank BPR DMS',
                'client_id' => '21',
                'sublayanan_id' => '1',
                'url' => 'https://bankdms.co.id/profil',
                'pedoman' => 'produk/Website Bank BPR DMS.pdf',
            ],
            [
                'nama' => 'Desain Website Bank BPR DMS',
                'client_id' => '21',
                'sublayanan_id' => '19',
                'url' => 'https://bankdms.co.id/profil',
                'pedoman' => 'produk/Website Bank BPR DMS.pdf',
            ],
            [
                'nama' => 'Website Bank BPR Kridadhana Citranusa',
                'client_id' => '22',
                'sublayanan_id' => '1',
                'url' => 'https://www.bprkridadhana.com/',
                'pedoman' => 'produk/Website BPR Kridadhana.pdf',
            ],
            [
                'nama' => 'Desain Website Bank BPR Kridadhana Citranusa',
                'client_id' => '22',
                'sublayanan_id' => '19',
                'url' => 'https://www.bprkridadhana.com/',
                'pedoman' => 'produk/Website BPR Kridadhana.pdf',
            ],
            [
                'nama' => 'Website Bank BPR Cipta',
                'client_id' => '23',
                'sublayanan_id' => '1',
                'url' => 'https://bankcipta.com// ',
                'pedoman' => 'produk/Website Bank BPR Cipta.pdf',
            ],

            [
                'nama' => 'Desain Website Bank BPR Cipta',
                'client_id' => '23',
                'sublayanan_id' => '19',
                'url' => 'https://bankcipta.com// ',
                'pedoman' => 'produk/Website Bank BPR Cipta.pdf',
            ],

            [
                'nama' => 'Website Company Profile Digital Karya Anoa',
                'client_id' => '24',
                'sublayanan_id' => '3',
                'url' => 'https://digitalkaryaanoa.co.id/',
                'pedoman' => 'produk/Company Profile Digital Karya Anoa.pdf',
            ],

            [
                'nama' => 'Digital Marketing Anoa Company',
                'client_id' => '24',
                'sublayanan_id' => '17',
                'url' => 'https://digitalkaryaanoa.co.id/',
                'pedoman' => 'produk/Company Profile Digital Karya Anoa.pdf',
            ],
            [
                'nama' => 'Desain Website Company Profile',
                'client_id' => '24',
                'sublayanan_id' => '19',
                'url' => 'https://digitalkaryaanoa.co.id/',
                'pedoman' => 'produk/Company Profile Digital Karya Anoa.pdf',
            ],
            [
                'nama' => 'Website Bank BPR Artha Nusantara Abadi',
                'client_id' => '25',
                'sublayanan_id' => '1',
                'url' => 'https://bprarthanusantaraabadi.com/',
                'pedoman' => 'produk/Website BPR Artha Nusantara Abadi.pdf',
            ],
            [
                'nama' => 'Desain Website Bank BPR Artha Nusantara Abadi',
                'client_id' => '25',
                'sublayanan_id' => '19',
                'url' => 'https://bprarthanusantaraabadi.com/',
                'pedoman' => 'produk/Website BPR Artha Nusantara Abadi.pdf',
            ],
            [
                'nama' => 'Website BPR Bank BSK',
                'client_id' => '26',
                'sublayanan_id' => '1',
                'url' => 'https://bankbsk.co.id// ',
                'pedoman' => 'produk/Website BPR Bank BSK.pdf',
            ],

            [
                'nama' => 'Desain Website BPR Bank BSK',
                'client_id' => '26',
                'sublayanan_id' => '19',
                'url' => 'https://bankbsk.co.id// ',
                'pedoman' => 'produk/Website BPR Bank BSK.pdf',
            ],
            [
                'nama' => 'Website Bankir Academy Indonesia',
                'client_id' => '27',
                'sublayanan_id' => '3',
                'url' => 'https://bankiracademy.com/',
                'pedoman' => 'produk/Bankir Academy Indonesia.pdf',
            ],
            [
                'nama' => 'Bankir Academy Mobile',
                'client_id' => '27',
                'sublayanan_id' => '10',
                'url' => 'https://bankiracademy.com/',
                'pedoman' => 'produk/Bankir Academy Indonesia.pdf',
            ],
            [
                'nama' => 'Desain Website Bankir Academy Mobile',
                'client_id' => '27',
                'sublayanan_id' => '19',
                'url' => 'https://bankiracademy.com/',
                'pedoman' => 'produk/Bankir Academy Indonesia.pdf',
            ],
            [
                'nama' => 'Desain Mobile Bankir Academy Mobile',
                'client_id' => '27',
                'sublayanan_id' => '20',
                'url' => 'https://bankiracademy.com/',
                'pedoman' => 'produk/Bankir Academy Indonesia.pdf',
            ],
            [
                'nama' => 'Company Profile Digital Samin Media Pustaka',
                'client_id' => '28',
                'sublayanan_id' => '3',
                'url' => 'https://www.samin-news.com// ',
                'pedoman' => 'produk/Samin Media Pustaka.pdf',
            ],
            [
                'nama' => 'Digital Marketing Samin Media Pustaka',
                'client_id' => '28',
                'sublayanan_id' => '17',
                'url' => 'https://www.samin-news.com// ',
                'pedoman' => 'produk/Samin Media Pustaka.pdf',
            ],
            [
                'nama' => 'Desain Website Samin Media Pustaka',
                'client_id' => '28',
                'sublayanan_id' => '19',
                'url' => 'https://www.samin-news.com// ',
                'pedoman' => 'produk/Samin Media Pustaka.pdf',
            ],
            [
                'nama' => 'E-Ticketing By BUMDes',
                'client_id' => '29',
                'sublayanan_id' => '14',
                'url' => 'https://akarindo.id/',
                'pedoman' => 'produk/Pilot Project WithBUMDes.pdf',
            ],
            [
                'nama' => 'Poin Of Sale Pilot Project With BUMDes',
                'client_id' => '29',
                'sublayanan_id' => '1',
                'url' => 'https://akarindo.id/',
                'pedoman' => 'produk/Pilot Project WithBUMDes.pdf',
            ],
        ];

        Produk::insert($produks);
    }
}
