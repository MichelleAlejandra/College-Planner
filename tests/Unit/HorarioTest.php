<?php

namespace Tests\Unit;

use App\Models\Horario;
use App\Models\Materia;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HorarioTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_horario_belongs_to_materia()
    {
        $horario = new Horario();
        $materia = Materia::create(
            Config("constantes.materia_test")
        );

        $horario->materia_id = $materia->id;

        $this->assertInstanceOf(Materia::class, $horario->materia);
    }
}
