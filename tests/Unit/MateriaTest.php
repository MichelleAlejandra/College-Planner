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
    public function test_a_materia_belongs_to_actividad()
    {
        $materia = new Materia();
        $this->assertInstanceOf(Collection::class, $materia->actividades);
    }
}
