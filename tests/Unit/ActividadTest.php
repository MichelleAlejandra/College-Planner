<?php

namespace Tests\Unit;

use App\Models\Actividad;
use App\Models\Materia;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActividadTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_atividad_belongs_to_materia()
    {
        $actividad = new Actividad();
        $materia = Materia::create(
            Config("constantes.materia_test")
        );

        $actividad->materia_id = $materia->id;

        $this->assertInstanceOf(Materia::class, $actividad->materia);
    }
}
