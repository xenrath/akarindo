<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'kode' => $this->kodeUser(),
                'role' => 'admin',
                'nama' => 'Wahyu Kristianto',
                'email' => 'admin@gmail.com',
                'telp' => null,
                'alamat' => null,
                'foto' => 'user/admin.png',
                'password' =>  bcrypt('admin'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'cs',
                'nama' => 'Radita Citra Oktaviyani',
                'email' => 'cs@gmail.com',
                'telp' => '81234567890',
                'alamat' => 'Semarang',
                'foto' => 'user/radita.png',
                'password' =>  bcrypt('cs'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'teknisi',
                'nama' => 'Arief Rahman Hakim',
                'email' => 'web1@gmail.com',
                'telp' => '82345678901',
                'alamat' => 'Semarang',
                'foto' => 'user/arief.png',
                'password' =>  bcrypt('web1'),
                'layanan_id' => '1',
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'teknisi',
                'nama' => 'Dani Kuswoyo',
                'email' => 'web2@gmail.com',
                'telp' => '83456789012',
                'alamat' => 'Semarang',
                'foto' => 'user/dani.png',
                'password' =>  bcrypt('web2'),
                'layanan_id' => '1',
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'teknisi',
                'nama' => 'Silvia Dewi Anggreani',
                'email' => 'web3@gmail.com',
                'telp' => '84567890123',
                'alamat' => 'Semarang',
                'foto' => 'user/silvia.png',
                'password' =>  bcrypt('web3'),
                'layanan_id' => '1',
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'teknisi',
                'nama' => 'Bimo Akbar Fadli',
                'email' => 'mobile@gmail.com',
                'telp' => '85678901234',
                'alamat' => 'Semarang',
                'foto' => 'user/bimo.png',
                'password' =>  bcrypt('mobile'),
                'layanan_id' => '2',
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'teknisi',
                'nama' => 'Widya',
                'email' => 'marketing1@gmail.com',
                'telp' => '86789012345',
                'alamat' => 'Semarang',
                'foto' => 'user/widya.png',
                'password' =>  bcrypt('marketing1'),
                'layanan_id' => '3',
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'teknisi',
                'nama' => 'Mufti Maulana',
                'email' => 'marketing2@gmail.com',
                'telp' => '87890123456',
                'alamat' => 'Semarang',
                'foto' => 'user/mufti.png',
                'password' =>  bcrypt('marketing2'),
                'layanan_id' => '3',
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'teknisi',
                'nama' => 'Jumagung Roni Olop',
                'email' => 'grafis@gmail.com',
                'telp' => '88901234567',
                'alamat' => 'Semarang',
                'foto' => 'user/admin.png',
                'password' =>  bcrypt('grafis'),
                'layanan_id' => '4',
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT.BPR Eleska Artha',
                'email' => 'help.eleskaaartha@gmail.com',
                'telp' => '80123456781',
                'alamat' => 'd.a Hotel Surya Yudha Lantai 2,Jl.Gerilya Barat No.30A Karangpucung Purwokerto - 53142 ',
                'foto' => 'user/eleska.png',
                'password' =>  bcrypt('client1'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT.BPR Insumo Sumberarto',
                'email' => 'help.insumobisa@gmail.com',
                'telp' => '80123456782',
                'alamat' => 'Jl.Urip Sumoharjo No.106,Kaliombo,Kec.Kota,Kota Kediri,Jawa Timur 64129',
                'foto' => 'user/insumo.png',
                'password' =>  bcrypt('client2'),
                'layanan_id' => null,
                'status' => true

            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT.BPR Taruna Adidaya Santosa',
                'email' => 'help.taruna@gmail.com',
                'telp' => '80123456783',
                'alamat' => 'Jl. HOS Cokroaminoto No.8B, Kudus, Jawa Tengah',
                'foto' => 'user/taruna.png',
                'password' =>  bcrypt('client3'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT.BPR Mekar Nugraha',
                'email' => 'help.mekarnugraha@gmail.com',
                'telp' => '80123456784',
                'alamat' => 'Jl.Raya Klepu No.10 Kec.Bregas, Kab.Semarang,Jawa Tengah,Indonesia ',
                'foto' => 'user/mekar.png',
                'password' =>  bcrypt('client4'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT.BPR Surya Kencana',
                'email' => 'help.suryakencana@gmail.com',
                'telp' => '80123456785',
                'alamat' => 'Jl. Suryakencana No.99, RT.03/RW.06, Babakan Ps., Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16123',
                'foto' => 'user/surya.png',
                'password' =>  bcrypt('client5'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT.BPR BKK Temanggung (Perseroda)',
                'email' => 'help.bkktmg@gmail.com',
                'telp' => '80123456786',
                'alamat' => 'Jl. Suyoto No.3A, Rolikuran, Kertosari, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah 56212',
                'foto' => 'user/temangung.png',
                'password' =>  bcrypt('client6'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT.BPR Bahtera Artha Jaya',
                'email' => 'help.bankbaja@gmail.com',
                'telp' => '80123456787',
                'alamat' => 'Jalan Proklamator. 170 A Kelurahan Bandar Jaya, Bandar Jaya Bar., Kec. Terbanggi Besar, Kabupaten Lampung Tengah, Lampung 34163',
                'foto' => 'user/baja.png',
                'password' =>  bcrypt('client7'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT. BPR Sinar Mitra Sejahtera',
                'email' => 'help.sinarmitrasjr@gmail.com',
                'telp' => '80123456788',
                'alamat' => 'Jl. Abdulrahman Saleh No.199, Kembangarum, Kec. Semarang Barat, Kota Semarang, Jawa Tengah 50183',
                'foto' => 'user/sms.png',
                'password' =>  bcrypt('client8'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT. Bank Perkreditan Rakyat Perbaungan Hombar Makmur',
                'email' => 'help.bprphm@gmail.com',
                'telp' => '80123456789',
                'alamat' => 'Karang Anyar, Beringin, Sidodadi Ramunia, Kec. Beringin, Kabupaten Deli Serdang, Sumatera Utara 20551',
                'foto' => 'user/phm.png',
                'password' =>  bcrypt('client9'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT. Ayo Kerja Indonesia',
                'email' => 'help.ayokerjaind@gmail.com',
                'telp' => '80123456771',
                'alamat' => 'Jl. Bukit Limau VIII FE 3 Bhromelia Permata Puri, Bringin, Ngaliyan, Kota Semarang, Jawa Tengah 50189 ',
                'foto' => 'user/kerja.png',
                'password' =>  bcrypt('client10'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT. Kurnia Makmur Abadi Jaya',
                'email' => 'help.kurniamakmur@gmail.com',
                'telp' => '80123456772',
                'alamat' => 'Jl. Jenderal Sudirman No.354, Karangayu, Kec. Semarang Barat, Kota Semarang, Jawa Tengah 50149',
                'foto' => 'user/kurnia.png',
                'password' =>  bcrypt('client11'),
                'layanan_id' => null,
                'status' => true
            ],

            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT. BPR Dana Mulia Sejahtera',
                'email' => 'help.danamuliasjr@gmail.com',
                'telp' => '80123456773',
                'alamat' => 'Jl. Pos No. 15 Tanjungpinang Kepulauan Riau, 29111. Telp. (0771) 450 1455',
                'foto' => 'user/dms.png',
                'password' =>  bcrypt('client12'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => ' PT.Bank Pengkreditan Rakyat Kridadhana Citranusa',
                'email' => 'help.kridadhana@gmail.com',
                'telp' => '80123456775',
                'alamat' => ' Jl. Semeru Sel. No.07, Dampit, Kec. Dampit, Kabupaten Malang, Jawa Timur 65181',
                'foto' => 'user/krida.png',
                'password' =>  bcrypt('client13'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT.BPR Cipta Dana Mulia',
                'email' => 'help.ciptadanamulia@gmail.com',
                'telp' => '80123456776',
                'alamat' => 'Jln Yos Sudarso Komplek Ruko Wadah Artha Blok B5 Kota Metro Metro Pusat',
                'foto' => 'user/cipta.png',
                'password' =>  bcrypt('client14'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT.Digital Karya Anoa',
                'email' => 'help.digitalanoa@gmail.com',
                'telp' => '80123456777',
                'alamat' => 'Jl. Bukit Limau VIII FE 3 Bhromelia Permata Puri, Bringin, Ngaliyan, Kota Semarang, Jawa Tengah 50189 ',
                'foto' => 'user/anoa.png',
                'password' =>  bcrypt('client15'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT.Bank Artha Nusantara Abadi ',
                'email' => 'help.arthaabadi@gmail.com',
                'telp' => '80123456778',
                'alamat' => 'Jl. Pucang Gading Raya No.65, Pucanggading, Batursari, Kec. Mranggen, Kabupaten Demak, Jawa Tengah 59567',
                'foto' => 'user/abadi.png',
                'password' =>  bcrypt('client16'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT.Bank Samawa Kencana',
                'email' => 'help.banksamawa@gmail.com',
                'telp' => '80123456779',
                'alamat' => 'Kantor PusatJalan Pendidikan No. 19 Alas, Sumbawa, NTB 84353',
                'foto' => 'user/bsk.png',
                'password' =>  bcrypt('client17'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT. Bankir Academy Indonesia',
                'email' => 'help.bankirind@gmail.com',
                'telp' => '80123456761',
                'alamat' => 'Jl. Jendral Sudirman 354, Semarang Barat Kota Semarang',
                'foto' => 'user/bankir.png',
                'password' =>  bcrypt('client18'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'PT.Samin Media Pustaka',
                'email' => 'help.saminpustaka@gmail.com',
                'telp' => '80123456762',
                'alamat' => 'Kampung Saliyan RT.05 RW.02 Pati Lor, Pati - Jawa Tengah',
                'foto' => 'user/samin.png',
                'password' =>  bcrypt('client19'),
                'layanan_id' => null,
                'status' => true
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'Andre BUMDes',
                'email' => 'help.andrebumdes@gmail.com',
                'telp' => '80123456763',
                'alamat' => 'Jl. Jendral Sudirman 354, Semarang Barat Kota Semarang',
                'foto' => 'user/bumdes.png',
                'password' =>  bcrypt('client20'),
                'layanan_id' => null,
                'status' => true
            ],
        ];

        User::insert($users);
    }

    public function kodeUser()
    {
        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
        $kode  = substr(str_shuffle($karakter), 0, 10);
        return $kode;
    }
}
