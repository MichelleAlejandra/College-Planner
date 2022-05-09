<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tarea
 *
 * @property $id
 * @property $lista_id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tarea extends Model
{

    static $rules = [
        'lista_id' => 'required',
        'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['lista_id', 'nombre', 'user_id'];

    public function lista()
    {
        //return $this->hasOne('App\Models\lista', 'id', 'lista_id');
        return $this->belongsTo(Lista::class, 'lista_id');
    }

}
