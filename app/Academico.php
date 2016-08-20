<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academico extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'academicos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rfc', 'nombre', 'telefono', 
        'celular', 'correo_electronico'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
