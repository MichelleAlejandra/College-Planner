<?php

namespace Tests\Browser;

use App\Models\Actividad;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Materia;
use Illuminate\Support\Facades\Hash;

class ActividadesTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_create_actividad()
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
            $browser->visit('/actividad/1/index');
            $browser->clickLink('Agregar');
            $browser->visit('/actividad/1/create');
            $browser->type('descripcion', 'Pruebas automatizadas');
            $browser->type('horas', '15');
            $browser->press('Guardar');
            $browser->assertPathIs('/actividad/1/index')
                ->assertSee('Pruebas automatizadas');
        });
    }

    public function test_edit_actividades()
    {
        User::create([
            'name' => 'Usuario prueba',
            'email' => 'michellea.gonzalezh@uqvirtual.edu.co',
            'password' => Hash::make('hola123'),
        ]);

        Materia::create(Config("constantes.materia_test"));

        Actividad::create([
            'horas' => '15',
            'descripcion' => 'Pruebas automatizadas',
            'materia_id' => '1',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/');
            $browser->clickLink('Materias');
            $browser->visit('/materias');
            $browser->visit('/actividad/1/index');
            $browser->visit('/actividad/1/edit');
            $browser->type('descripcion', 'Creación de pruebas automatizadas');
            $browser->type('horas', '20');
            $browser->press('Guardar');
            $browser->assertPathIs('/actividad/1/index')
                    ->assertSee('Creación de pruebas automatizadas');
        });
    }

    public function test_delete_actividades()
    {
        User::create([
            'name' => 'Usuario prueba',
            'email' => 'michellea.gonzalezh@uqvirtual.edu.co',
            'password' => Hash::make('hola123'),
        ]);

        Materia::create(Config("constantes.materia_test"));

        Actividad::create([
            'horas' => '15',
            'descripcion' => 'Pruebas automatizadas',
            'materia_id' => '1',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/');
            $browser->clickLink('Materias');
            $browser->visit('/materias');
            $browser->visit('/actividad/1/index');
            $browser->click('@delete-button');
            $browser->assertPathIs('/actividad/1/index');
            $browser->assertSee('Actividad eliminada satisfactoriamente');
        });
    }
}
