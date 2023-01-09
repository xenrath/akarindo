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
                'password' =>  bcrypt('admin')
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'cs',
                'nama' => 'Syera Jehani',
                'email' => 'cs@gmail.com',
                'telp' => '81234567890',
                'alamat' => 'Semarang',
                'foto' => 'user/syera.png',
                'password' =>  bcrypt('cs')
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'teknisi',
                'nama' => 'Aldi Mahendra',
                'email' => 'teknisi@gmail.com',
                'telp' => '82345678901',
                'alamat' => 'Semarang',
                'foto' => 'user/aldi.png',
                'password' =>  bcrypt('teknisi')
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'Johan Adibaskara',
                'email' => 'client1@gmail.com',
                'telp' => '83456789012',
                'alamat' => 'Tegal',
                'foto' => 'user/johan.png',
                'password' =>  bcrypt('client1')
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'Andre Galaksa',
                'email' => 'client2@gmail.com',
                'telp' => '84567890123',
                'alamat' => 'Tegal',
                'foto' => 'user/andre.png',
                'password' =>  bcrypt('client2')
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
