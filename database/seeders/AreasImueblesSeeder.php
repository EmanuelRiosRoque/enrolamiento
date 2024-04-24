<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreasImueblesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inmubles = [
            ['id_location' => 'LIC-9999', 'desc_location' => 'Lugar de Trabajo Licencias'],
            ['id_location' => '6PJ-0013', 'desc_location' => 'Plaza Juárez 13ro piso'],
            ['id_location' => '0OT-0000', 'desc_location' => 'Oriente']
        ];
    }
}
