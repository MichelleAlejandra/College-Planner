<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Michelle Alejandra',
            'email' => 'michellea.gonzalezh@uqvirtual.edu.co',
            'password' => Hash::make('hola123'),
        ]);
    }
}
