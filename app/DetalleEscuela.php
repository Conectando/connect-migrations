<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleEscuela extends Model
{
    
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
        'escuela_id', 'clave_ct', 'nivel_id',
        'academico_id', 'programa_id', 'turno', 
        'correo', 'telefono', 'zona', 'sector', 
        'sostenimiento'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * return encode to utf8 name.
     *
     * @var string
     * @return string
     */
    public function getSostenimientoAttribute($value)
    {
        return utf8_encode($this->attributes['sostenimiento']);
    }
    /**
     * The decode to utf8 name.
     *
     * @var string
     * @return void
     */
    public function setSostenimientoAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['sostenimiento'] = utf8_decode($value);
        }
    }

}
