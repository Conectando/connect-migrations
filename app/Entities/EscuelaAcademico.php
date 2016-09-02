<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class EscuelaAcademico extends Model implements Transformable
{
    use TransformableTrait;
    
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'escuelas_academicos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'detalle_escuela_id', 'academico_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     *
     * Get the DetalleEscuela record associated with the EscuelaAcademico.
     */
    public function detalleEscuela()
    {
        return $this->hasOne('App\Entities\DetalleEscuela', 'id', 'detalle_escuela_id');
    }

    /**
     *
     * Get the Academico record associated with the Escuela.
     */
    public function academico()
    {
        return $this->hasOne('App\Entities\Academico', 'id', 'academico_id');
    }

}
