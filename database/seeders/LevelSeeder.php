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
            'id' => '1',
            'level' => 'sulit',
            'pengerjaan' => 'pengerjaan website',
            'perbaikan' => 'perbaikan website',
        ];
        
        Level::insert($levels);
    }
}
