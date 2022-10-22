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
                'name' => 'Admin',
                'role_id' => '1',
                'email' => 'admin@gmail.com',
                'phone' => '812345678901',
                'gambar' => 'user/google.jpg',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Client1',
                'role_id' => '2',
                'email' => 'client1@gmail.com',
                'phone' => '823456789012',
                'gambar' => 'user/google.jpg',
                'password' => bcrypt('client1'),
            ],
        ];

        User::insert($users);
    }
}
