<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Horario;
use App\Models\Materia;
use Illuminate\Support\Facades\Hash;

class HorarioTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_create_horario()
    {
        User::create([
            'name' => 'Usuario prueba',
            'email' => 'michellea.gonzalezh@uqvirtual.edu.co',
            'password' => Hash::make('hola123')
        ]);

        Materia::create(Config("constantes.materia_test"));

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/horario');
            $browser->clickLink('Agregar');
            $browser->visit('/horario/create');
            $browser->select('materia_id');
            $browser->select('dia_semana');
            $browser->select('hora_inicial');
            $browser->type('duracion', '2');
            $browser->press('Guardar');
            $browser->assertPathIs('/horario')->assertSee('Horario agregado satisfactoriamente');
        });
    }

    public function test_edit_horario()
    {
        $user = User::create([
            'name' => 'Usuario prueba',
            'email' => 'michellea.gonzalezh@uqvirtual.edu.co',
            'password' => Hash::make('hola123'),
        ]);

        $materia = Materia::create(Config("constantes.materia_test"));

        Horario::create([
            'dia_semana' => 'Lunes',
            'hora_inicial' => '7',
            'hora_final' => '9',
            'duracion' => '2',
            'materia_id' => $materia->id,
            'materia_nombre' => $materia->nombre,
            'materia_color' => $materia->color,
            'user_id' => $user->id
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/');
            $browser->clickLink('Horario');
            $browser->visit('/horario');
            $browser->clickLink(Horario::find(1)->nombre);
            $browser->visit('/horario/1/edit');
            $browser->select('dia_semana');
            $browser->select('hora_inicial');
            $browser->press('Guardar');
            $browser->assertPathIs('/horario')->assertSee('Horario actualizado correctamente');
        });
    }

    public function test_delete_horario()
    {
        $user = User::create([
            'name' => 'Usuario prueba',
            'email' => 'michellea.gonzalezh@uqvirtual.edu.co',
            'password' => Hash::make('hola123'),
        ]);

        $materia = Materia::create(Config("constantes.materia_test"));

        Horario::create([
            'dia_semana' => 'Lunes',
            'hora_inicial' => '7',
            'hora_final' => '9',
            'duracion' => '2',
            'materia_id' => $materia->id,
            'materia_nombre' => $materia->nombre,
            'materia_color' => $materia->color,
            'user_id' => $user->id
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/');
            $browser->clickLink('Horario');
            $browser->visit('/horario');
            $browser->clickLink(Horario::find(1)->nombre);
            $browser->visit('/horario/1/edit');
            $browser->press('Eliminar');
            $browser->assertPathIs('/horario')->assertSee('Horario eliminado correctamente');
        });
    }
}
