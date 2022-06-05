<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Lista;
use Illuminate\Support\Facades\Hash;

class ListasTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_create_lista()
    {
        User::create([
            'name' => 'Usuario prueba',
            'email' => 'michellea.gonzalezh@uqvirtual.edu.co',
            'password' => Hash::make('hola123'),
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/listas');
            $browser->clickLink('Agregar');
            $browser->visit('/listas/create');
            $browser->type('nombre', 'Universidad');
            $browser->press('Guardar');
            $browser->assertPathIs('/listas')
                    ->assertSee('Universidad');
        });
    }

    public function test_edit_lista()
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
            $browser->visit('/listas');
            $browser->visit('/listas/1/edit');
            $browser->type('nombre', 'Trabajos');
            $browser->press('Guardar');
            $browser->assertPathIs('/listas')
                    ->assertSee('Trabajos');
        });
    }

    public function test_delete_lista()
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
            $browser->visit('/listas');
            $browser->click('@delete-button');
            $browser->assertPathIs('/listas');
            $browser->assertSee('Lista eliminada exitosamente');
        });
    }
}
