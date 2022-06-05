<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Materia;
use Illuminate\Support\Facades\Hash;

class MateriasTest extends DuskTestCase
{
    //use WithoutMiddleware;
    use DatabaseMigrations;
    /**
     * My test implementation
     */
    public function test_create_materia()
    {
        User::create([
            'name' => 'Usuario prueba',
            'email' => 'michellea.gonzalezh@uqvirtual.edu.co',
            'password' => Hash::make('hola123'),
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/');
            $browser->clickLink('Materias');
            $browser->visit('/materias');
            $browser->clickLink('Agregar');
            $browser->visit('/materias/create');
            $browser->type('nombre', 'Fundamentos de HCI');
            $browser->type('creditos', '3');
            $browser->type('horas', '4');
            $browser->type('color', '#ffffff');
            $browser->press('Guardar');
            $browser->assertPathIs('/materias')->assertSee('Materia creada satisfactoriamente');
        });
    }

    public function test_edit_materia()
    {
        User::create([
            'name' => 'Usuario prueba',
            'email' => 'michellea.gonzalezh@uqvirtual.edu.co',
            'password' => Hash::make('hola123'),
        ]);

        Materia::create(Config("constantes.materia_test"));

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/');
            $browser->clickLink('Materias');
            $browser->visit('/materias');
            $browser->visit('/materias/1/edit');
            $browser->type('nombre', 'Ingeniería de software III');
            $browser->type('horas', '3');
            $browser->press('Guardar');
            $browser->assertPathIs('/materias')->assertSee('Ingeniería de software III');
        });
    }

    public function test_delete_materia()
    {
        User::create([
            'name' => 'Usuario prueba',
            'email' => 'michellea.gonzalezh@uqvirtual.edu.co',
            'password' => Hash::make('hola123'),
        ]);

        Materia::create(Config("constantes.materia_test"));

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/');
            $browser->clickLink('Materias');
            $browser->visit('/materias');
            $browser->click('@delete-button');
            $browser->assertPathIs('/materias');
            $browser->assertSee('Materia eliminada satisfactoriamente');
        });
    }
}
