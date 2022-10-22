<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => '1',
                'role' => 'admin'
            ],
            [
                'id' => '2',
                'role' => 'pembeli'
            ],
        ];

        Role::insert($roles);
    }
}
