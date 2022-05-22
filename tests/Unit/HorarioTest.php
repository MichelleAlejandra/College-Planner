<?php

namespace Tests\Unit;

use App\Models\Horario;
use App\Models\Materia;
use Tests\TestCase;

class HorarioTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_horario_belongs_to_materia()
    {
        $horario = new Horario();
        $materia = new Materia();

        $materia->id = 1;
        $horario->materia_id = $materia->id;

        $this->assertInstanceOf(Materia::class, $horario->materia);
    }
}
