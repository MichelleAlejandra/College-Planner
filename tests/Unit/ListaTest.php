<?php

namespace Tests\Unit;

use App\Models\Lista;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;

class ListaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_lista_has_many_tareas()
    {
        $lista = new Lista();
        $this->assertInstanceOf(Collection::class, $lista->tareas);
    }
}
