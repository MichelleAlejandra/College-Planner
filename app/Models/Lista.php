<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lista
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lista extends Model
{

    static $rules = [
        'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'user_id'];

    public function tarea()
    {
        return $this->hasMany(Tarea::class, 'id');
    }

}
