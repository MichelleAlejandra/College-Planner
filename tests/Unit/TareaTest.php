<?php

namespace Tests\Unit;

use App\Models\Lista;
use App\Models\Tarea;
use Tests\TestCase;

class TareaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_tarea_belongs_to_lista()
    {
        $tarea = new Tarea();
        $lista = new Lista();

        $lista->id = 1;
        $tarea->lista_id = $lista->id;

        $this->assertInstanceOf(Lista::class, $tarea->lista);
    }
}
