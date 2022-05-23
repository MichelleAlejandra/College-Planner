<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Materia;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MateriaControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_materias_screen_can_be_rendered()
    {
        $user = User::create([
            'name' => 'Usuario prueba',
            'email' => 'prueba@gmail.com',
            'password' => 'password',
        ]);

        $this->actingAs($user);

        $response = $this->get('/materias');

        $response->assertStatus(200);

    }

    public function test_users_can_create_materias()
    {
        $user = User::create([
            'name' => 'Usuario prueba',
            'email' => 'prueba@gmail.com',
            'password' => 'password',
        ]);

        $this->actingAs($user);

        $materia = Materia::create(
            Config("constantes.materia_test")
        );
        $materia->user_id = $user->id;
        $response = $this->post('/materias', Config("constantes.materia_test"));

        $response->assertStatus(302);

        $materia_guardada = Materia::first();

        $this->assertEquals('Ingeniería de software III', $materia_guardada->nombre);
        $this->assertEquals('3', $materia_guardada->creditos);
        $this->assertEquals('4', $materia_guardada->horas);
    }
/*
    public function test_users_can_edit_materias()
    {
        $user = User::create([
            'name' => 'Usuario prueba',
            'email' => 'prueba2@gmail.com',
            'password' => 'password',
        ]);

        $this->actingAs($user);

        $materia_creada = Materia::create(
            Config("constantes.materia_test")
        );
        $materia_creada->user_id = $user->id;

        $materia_editar = [
            'nombre'  => 'Ingeniería de software',
            'creditos' => 2,
            'horas' => 2,
            'horas_registradas' => 0,
            'color' => '#fabfb7',
            'horas_dedicar_total' => 144,
            'horas_dedicar_semana'=> 9,
            'horas_pendientes' => 1,
            'horas_total_clase' => 64,
            'horas_total' => 144,
            'horas_pendientes_total' => 80,
            'horas_ejecutadas' => 0,
            'user_id' => $user->id
        ];

        $this->get('materias/edit', ['id' => $materia_creada->id]);

        $response = $this->post('/materias', $materia_editar, $materia_creada);

        $response->assertStatus(302);

        $this->assertEquals('Ingeniería de software', $materia_creada->nombre);
        $this->assertEquals('2', $materia_creada->creditos);
        $this->assertEquals('2', $materia_creada->horas);

    }

    public function test_users_can_delete_materias()
    {
        $user = User::create([
            'name' => 'Usuario prueba',
            'email' => 'prueba@gmail.com',
            'password' => 'password',
        ]);

        $this->actingAs($user);

        $materia_data = [
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
            'user_id' => $user->id
        ];

        $mate = Materia::create($materia_data);

        $this->assertEquals(1, Materia::count());

        $response = $this->post('materias', ['id' => $mate->id]);

        $response->assertStatus(302);
        $this->assertEquals(0, Materia::count());
    }
*/

}
