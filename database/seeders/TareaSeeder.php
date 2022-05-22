<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('tareas')->insert([
            'nombre'  => 'Hacer despliegue de software',
            'lista_id' => '1',
            'user_id' => 1
        ]);

        DB::table('tareas')->insert([
            'nombre'  => 'Escribir ensayo',
            'lista_id' => '1',
            'user_id' => 1
        ]);

        DB::table('tareas')->insert([
            'nombre'  => 'Responder encuesta',
            'lista_id' => '1',
            'user_id' => 1
        ]);

        DB::table('tareas')->insert([
            'nombre'  => 'Hablar con el jefe',
            'lista_id' => '2',
            'user_id' => 1
        ]);

        DB::table('tareas')->insert([
            'nombre'  => 'Llamar a Karla',
            'lista_id' => '1',
            'user_id' => 1
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
