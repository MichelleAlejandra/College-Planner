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
    protected $fillable = ['nombre', 'creditos', 'horas', 'horas_dedicar_total', 'horas_dedicar_semana', 'horas_pendientes', 'horas_total_clase', 'horas_total', 'horas_pendientes_total', 'horas_ejecutadas', 'user_id'];

    static $rules = [
        'nombre' => 'required',
        'creditos' => 'required',
        'horas' => 'required',
    ];

    protected $perPage = 20;

    public function actividades()
    {
        return $this->belongsTo(Actividad::class, 'materia_id');
    }
}
