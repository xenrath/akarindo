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
                'nama' => 'Argantara Reynand',
                'email' => 'admin@gmail.com',
                'telp' => null,
                'alamat' => null,
                'foto' => null,
                'password' =>  bcrypt('admin'),
                'layanan_id' => null
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'cs',
                'nama' => 'Raditra Citra Oktaviyani',
                'email' => 'cs@gmail.com',
                'telp' => '81234567890',
                'alamat' => 'Semarang',
                'foto' => 'user/raditra.jpg',
                'password' =>  bcrypt('cs'),
                'layanan_id' => null
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'teknisi',
                'nama' => 'Arief Rahman Hakim',
                'email' => 'web1@gmail.com',
                'telp' => '82345678901',
                'alamat' => 'Semarang',
                'foto' => 'user/arief.jpg',
                'password' =>  bcrypt('web1'),
                'layanan_id' => '1'
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'teknisi',
                'nama' => 'Dani Kuswoyo',
                'email' => 'web2@gmail.com',
                'telp' => '83456789012',
                'alamat' => 'Semarang',
                'foto' => 'user/dani.jpg',
                'password' =>  bcrypt('web2'),
                'layanan_id' => '1'
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'teknisi',
                'nama' => 'Silvia Dewi Anggreani',
                'email' => 'web3@gmail.com',
                'telp' => '84567890123',
                'alamat' => 'Semarang',
                'foto' => 'user/silvia.jpg',
                'password' =>  bcrypt('web3'),
                'layanan_id' => '1'
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'teknisi',
                'nama' => 'Bimo Akbar Fadli',
                'email' => 'mobile@gmail.com',
                'telp' => '85678901234',
                'alamat' => 'Semarang',
                'foto' => 'user/bimo.jpg',
                'password' =>  bcrypt('mobile'),
                'layanan_id' => '2'
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'teknisi',
                'nama' => 'Widya',
                'email' => 'marketing1@gmail.com',
                'telp' => '86789012345',
                'alamat' => 'Semarang',
                'foto' => 'user/widya.jpg',
                'password' =>  bcrypt('marketing1'),
                'layanan_id' => '3'
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'teknisi',
                'nama' => 'Mufti Maulana',
                'email' => 'marketing2@gmail.com',
                'telp' => '87890123456',
                'alamat' => 'Semarang',
                'foto' => 'user/mufti.jpg',
                'password' =>  bcrypt('marketing2'),
                'layanan_id' => '3'
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'teknisi',
                'nama' => 'Jumagung Roni Olop',
                'email' => 'grafis@gmail.com',
                'telp' => '88901234567',
                'alamat' => 'Semarang',
                'foto' => 'user/jumagung.jpg',
                'password' =>  bcrypt('grafis'),
                'layanan_id' => '4'
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'Johan Adibaskara',
                'email' => 'client1@gmail.com',
                'telp' => '89012345678',
                'alamat' => 'Tegal',
                'foto' => 'user/johan.png',
                'password' =>  bcrypt('client1'),
                'layanan_id' => null
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'Andre Galaksa',
                'email' => 'client2@gmail.com',
                'telp' => '80123456789',
                'alamat' => 'Tegal',
                'foto' => 'user/andre.png',
                'password' =>  bcrypt('client2'),
                'layanan_id' => null
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
