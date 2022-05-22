<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materias')->insert([
            'nombre'  => 'Ingeniería de software III',
            'creditos' => 3,
            'horas' => 4,
            'horas_registradas' => 0,
            'color' => '#fabfb7',
            'horas_dedicar_total' => 144,
            'horas_dedicar_semana'=> 9,
            'horas_pendientes' => 1,
            'horas_total_clase' => 64,
            'horas_total' => 144,
            'horas_pendientes_total' => 80,
            'horas_ejecutadas' => 0,
            'user_id' => 1
        ]);

        DB::table('materias')->insert([
            'nombre'  => 'Bases de datos II',
            'creditos' => 3,
            'horas' => 4,
            'horas_registradas' => 0,
            'color' => '#84b6f4',
            'horas_dedicar_total' => 144,
            'horas_dedicar_semana'=> 9,
            'horas_pendientes' => 1,
            'horas_total_clase' => 64,
            'horas_total' => 144,
            'horas_pendientes_total' => 80,
            'horas_ejecutadas' => 0,
            'user_id' => 1
        ]);

        DB::table('materias')->insert([
            'nombre'  => 'Aministración de TI',
            'creditos' => 3,
            'horas' => 4,
            'horas_registradas' => 0,
            'color' => '#77dd77',
            'horas_dedicar_total' => 144,
            'horas_dedicar_semana'=> 9,
            'horas_pendientes' => 1,
            'horas_total_clase' => 64,
            'horas_total' => 144,
            'horas_pendientes_total' => 80,
            'horas_ejecutadas' => 0,
            'user_id' => 1
        ]);

        DB::table('materias')->insert([
            'nombre'  => 'Fundamentos de HCI',
            'creditos' => 3,
            'horas' => 4,
            'horas_registradas' => 0,
            'color' => '#fdcae1',
            'horas_dedicar_total' => 144,
            'horas_dedicar_semana'=> 9,
            'horas_pendientes' => 1,
            'horas_total_clase' => 64,
            'horas_total' => 144,
            'horas_pendientes_total' => 80,
            'horas_ejecutadas' => 0,
            'user_id' => 1
        ]);

        DB::table('materias')->insert([
            'nombre'  => 'Ingeniería económica',
            'creditos' => 3,
            'horas' => 4,
            'horas_registradas' => 0,
            'color' => '#fdfd96',
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
