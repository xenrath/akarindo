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
                'nama' => 'mudah',
                'lama' => '1',
            ],
            [
                'nama' => 'menengah',
                'lama' => '2',
            ],
            [
                'nama' => 'sulit',
                'lama' => '3',
            ]
        ];

        Level::insert($levels);
    }
}
