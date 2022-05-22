<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        DB::table('listas')->insert([
            'nombre'  => 'Universidad',
            'user_id' => 1
        ]);*/

        DB::table('listas')->insert([
            'nombre'  => 'Trabajo',
            'user_id' => 1
        ]);
    }
}
