<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    static $rules = [
        'dia_semana' => ['required', 'string', 'max:50'],
        'hora_inicial' => ['required', 'integer', 'max:24'],
        'duracion' => ['required', 'integer', 'max:12'],
    ];

    use HasFactory;

    protected $fillable = [
        'dia_semana',
        'hora_inicial',
        'hora_final',
        'duracion',
        'materia_id',
        'materia_nombre',
        'materia_color',
        'user_id'
    ];

    public function materia()
    {
        //return $this->hasOne('App\Models\lista', 'id', 'lista_id');
        return $this->belongsTo(Materia::class, 'materia_id');
    }
}
