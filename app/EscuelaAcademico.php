<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscuelaAcademico extends Model
{
    
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

}
