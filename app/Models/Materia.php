<?php

namespace App\Models;

use App\Models\Actividad;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'creditos', 'horas', 'horas_registradas', 'color','horas_dedicar_total', 'horas_dedicar_semana', 'horas_pendientes', 'horas_total_clase', 'horas_total', 'horas_pendientes_total', 'horas_ejecutadas', 'user_id'];

    static $rules = [
        'nombre' => ['required', 'string', 'max:150'],
        'creditos' => ['required', 'integer', 'max:10'],
        'horas' => ['required', 'integer', 'max:12'],
        'horas_registradas' => ['integer', 'max:horas'],
        'color' => ['required', 'string', 'max:7'],
    ];

    protected $perPage = 20;

    public function actividades()
    {
        return $this->HasMany(Actividad::class, 'materia_id');
    }

    public function horarios()
    {
        return $this->HasMany(Horario::class, 'materia_id');
    }
}
