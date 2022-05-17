<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materia::create([
            'nombre'  => 'Ingeniería de software III',
            'creditos' => 3,
            'horas' => 4,
            'color' => '#8a42f5',
            'horas_dedicar_total' => 144,
            'horas_dedicar_semana'=> 9,
            'horas_pendientes' => 1,
            'horas_total_clase' => 64,
            'horas_total' => 144,
            'horas_pendientes_total' => 80,
            'horas_ejecutadas' => 0,
            'user_id' => 1
        ]);

    }
}
