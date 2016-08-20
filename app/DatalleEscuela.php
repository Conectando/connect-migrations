<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatalleEscuela extends Model
{
    
    use UuidForKey;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detalles_escuelas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'escuela_id', 'clave_ct', 'rfc_director',
        'turno', 'zona', 'sostenimiento'
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
