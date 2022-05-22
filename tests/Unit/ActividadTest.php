<?php

namespace Tests\Unit;

use App\Models\Actividad;
use App\Models\Materia;
use Tests\TestCase;

class ActividadTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_atividad_belongs_to_materia()
    {
        $actividad = new Actividad();
        $materia = new Materia();

        $materia->id = 1;
        $actividad->materia_id = $materia->id;

        $this->assertInstanceOf(Materia::class, $actividad->materia);
    }
}
