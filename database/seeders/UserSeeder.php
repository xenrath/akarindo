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
                'nama' => 'admin',
                'email' => 'admin@gmail.com',
                'telp' => '812345678901',
                'alamat' => 'Kota Tegal',
                'foto' => 'user/admin1.png',
                'password' =>  bcrypt('admin')
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'Marzuki',
                'email' => 'marzuki@gmail.com',
                'telp' => '823456789012',
                'alamat' => 'Kota Tegal',
                'foto' => 'user/marzuki.jpeg',
                'password' =>  bcrypt('marzuki')
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'Hanif',
                'email' => 'hanif@gmail.com',
                'telp' => '82345678090',
                'alamat' => 'Kota Tegal',
                'foto' => 'user/hanif.png',
                'password' =>  bcrypt('hanif')
            ],
            [
                'kode' => $this->kodeUser(),
                'role' => 'client',
                'nama' => 'Anjani',
                'email' => 'anjani@gmail.com',
                'telp' => '823456789080',
                'alamat' => 'Kota Tegal',
                'foto' => 'user/anjani.png',
                'password' => bcrypt('anjani')
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
