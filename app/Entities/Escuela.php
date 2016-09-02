<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Escuela extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'escuelas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_ct', 'direccion', 'colonia', 'calle_derecha',
        'calle_izquierda', 'codigo_postal', 'municipio_inegi_id',
        'localidad_inegi_id', 'estado', 'longitud', 'latitud'
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
    public function getNombreCtAttribute($value)
    {
        return utf8_encode($this->attributes['nombre_ct']);
    }
    /**
     * The decode to utf8 name.
     *
     * @var string
     * @return void
     */
    public function setNombreCtAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['nombre_ct'] = utf8_decode($value);
        }
    }

    /**
     * return encode to utf8 name.
     *
     * @var string
     * @return string
     */
    public function getDireccionAttribute($value)
    {
        return utf8_encode($this->attributes['direccion']);
    }
    /**
     * The decode to utf8 name.
     *
     * @var string
     * @return void
     */
    public function setDireccionAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['direccion'] = utf8_decode($value);
        }
    }

    /**
     * return encode to utf8 name.
     *
     * @var string
     * @return string
     */
    public function getColoniaAttribute($value)
    {
        return utf8_encode($this->attributes['colonia']);
    }
    /**
     * The decode to utf8 name.
     *
     * @var string
     * @return void
     */
    public function setColoniaAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['colonia'] = utf8_decode($value);
        }
    }

    /**
     * return encode to utf8 name.
     *
     * @var string
     * @return string
     */
    public function getCalleDerechaAttribute($value)
    {
        return utf8_encode($this->attributes['calle_derecha']);
    }
    /**
     * The decode to utf8 name.
     *
     * @var string
     * @return void
     */
    public function setCalleDerechaAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['calle_derecha'] = utf8_decode($value);
        }
    }

    /**
     * return encode to utf8 name.
     *
     * @var string
     * @return string
     */
    public function getCalleIzquierdaAttribute($value)
    {
        return utf8_encode($this->attributes['calle_izquierda']);
    }
    /**
     * The decode to utf8 name.
     *
     * @var string
     * @return void
     */
    public function setCalleIzquierdaAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['calle_izquierda'] = utf8_decode($value);
        }
    }

    /**
     *
     * Get the LocalidadInegi record associated with the Escuela.
     */
    public function localidad()
    {
        return $this->hasOne('App\Entities\LocalidadInegi', 'id', 'localidad_inegi_id');
    }

    /**
     *
     * Get the MunicipioInegi record associated with the Escuela.
     */
    public function municipio()
    {
        return $this->hasOne('App\Entities\MunicipioInegi', 'id', 'municipio_inegi_id');
    }

    /**
     * Get the "detalles de escuelas" for the Escuela.
     */
    public function detalles()
    {
        return $this->hasMany('App\Entities\DetalleEscuela', 'escuela_id', 'id');
    }

}