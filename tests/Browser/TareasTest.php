<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Lista;
use App\Models\Tarea;
use Illuminate\Support\Facades\Hash;

class TareasTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_create_tarea()
    {
        User::create([
            'name' => 'Usuario prueba',
            'email' => 'michellea.gonzalezh@uqvirtual.edu.co',
            'password' => Hash::make('hola123'),
        ]);

        Lista::create([
            'nombre' => 'Lista prueba',
            'user_id' => 1
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/');
            $browser->clickLink('Listas');
            $browser->visit('/listas');
            $browser->visit('/tarea/1/index');
            $browser->clickLink('Agregar');
            $browser->visit('/tarea/1/create');
            $browser->type('nombre', 'Terminar documento');
            $browser->press('Guardar');
            $browser->assertPathIs('/tarea/1/index')
                    ->assertSee('Tarea creada satisfactoriamente');
        });
    }

    public function test_edit_tarea()
    {
        User::create([
            'name' => 'Usuario prueba',
            'email' => 'michellea.gonzalezh@uqvirtual.edu.co',
            'password' => Hash::make('hola123'),
        ]);

        Lista::create([
            'nombre' => 'Lista prueba',
            'user_id' => 1
        ]);

        Tarea::create([
            'lista_id' => '1',
            'nombre' => 'Terminar documento',
            'user_id' => '1'
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/');
            $browser->clickLink('Listas');
            $browser->visit('/listas');
            $browser->visit('/tarea/1/index');
            $browser->visit('/tareas/1/edit');
            $browser->type('nombre', 'Terminar documento soguar');
            $browser->press('Guardar');
            $browser->assertPathIs('/tarea/1/index')->assertSee('Terminar documento soguar');
        });
    }

    public function test_delete_tarea()
    {
        User::create([
            'name' => 'Usuario prueba',
            'email' => 'michellea.gonzalezh@uqvirtual.edu.co',
            'password' => Hash::make('hola123'),
        ]);

        Lista::create([
            'nombre' => 'Lista prueba',
            'user_id' => 1
        ]);

        Tarea::create([
            'lista_id' => '1',
            'nombre' => 'Terminar documento',
            'user_id' => '1'
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/');
            $browser->clickLink('Listas');
            $browser->visit('/listas');
            $browser->visit('/tarea/1/index');
            $browser->click('@delete-button');
            $browser->assertPathIs('/tarea/1/index');
            $browser->assertSee('Tarea eliminada satisfactoriamente');
        });
    }
}
