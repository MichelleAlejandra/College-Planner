<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Materia;
use Illuminate\Database\Eloquent\Collection;

class MateriaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_materia_has_many_actividades()
    {
        $materia = new Materia();
        $this->assertInstanceOf(Collection::class, $materia->actividades);
    }

    public function test_a_materia_has_many_horarios()
    {
        $materia = new Materia();
        $this->assertInstanceOf(Collection::class, $materia->horarios);
    }

}
