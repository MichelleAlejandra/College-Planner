<?php

namespace App\Models;

use App\Models\Materia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    static $rules = [
        'horas' => 'required',
        'descripcion' => 'required',
    ];

    protected $perPage = 20;

    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'horas',
        'descripcion',
        'materia_id',
    ];

    public function materias()
    {
        return $this->hasMany(Materia::class, 'materia_id');
    }
}
