<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            [
                'id' => '1',
                'nama' => 'mudah',
                'pengerjaan' => '30',
                'perbaikan' => '7',
            ],
            [
                'id' => '2',
                'nama' => 'menengah',
                'pengerjaan' => '60',
                'perbaikan' => '14',
            ],
            [
                'id' => '3',
                'nama' => 'sulit',
                'pengerjaan' => '90',
                'perbaikan' => '30',
            ]
        ];

        Level::insert($levels);
    }
}
