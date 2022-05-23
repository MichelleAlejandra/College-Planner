<?php

namespace Tests\Unit;

use App\Models\Lista;
use App\Models\Tarea;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TareaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_a_tarea_belongs_to_lista()
    {
        $tarea = new Tarea();
        $lista = Lista::create([
            'nombre' => 'Lista prueba',
            'user_id' => 1
        ]);

        $tarea->lista_id = $lista->id;

        $this->assertInstanceOf(Lista::class, $tarea->lista);
    }
}
