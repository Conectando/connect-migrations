<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class DetalleEscuela extends Model implements Transformable
{
    use TransformableTrait;
    
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

    /**
     *
     * Get the escuela record associated with the detalle escuela.
     */
    public function escuela()
    {
        return $this->hasOne('App\Entities\Escuela', 'id', 'escuela_id');
    }

    /**
     *
     * Get the nivelEducativo record associated with the detalle escuela.
     */
    public function nivel()
    {
        return $this->hasOne('App\Entities\NivelEducativo', 'id', 'nivel_id');
    }

    /**
     *
     * Get the academico record associated with the detalle escuela.
     */
    public function director()
    {
        return $this->hasOne('App\Entities\Academico', 'id', 'academico_id');
    }

    /**
     *
     * Get the programaEducativo record associated with the detalleEscuela.
     */
    public function programa()
    {
        return $this->hasOne('App\Entities\ProgramaEducativo', 'id', 'programa_id');
    }

    /**
     * Get the Indicador that owns the DetalleEscuela.
     */
    public function indicador()
    {
        return $this->belongsTo('App\Entities\Indicador', 'id', 'detalle_escuela_id');
    }

    /**
     * Get the estadistica that owns the DetalleEscuela.
     */
    public function estadistica()
    {
        return $this->belongsTo('App\Entities\Estadistica', 'id', 'detalle_escuela_id');
    }

}
