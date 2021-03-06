<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 *
 */
class Academico extends Model implements Transformable
{
    use TransformableTrait;
    
    /**
     * The table associated with the model.
     *
     * @access protected
     * @var string
     */
    protected $table = 'academicos';

    /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
    protected $fillable = [
        'rfc', 'nombre', 'apaterno', 'amaterno',
        'telefono', 'celular', 'correo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @access protected
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
    public function getNombreAttribute($value)
    {
        return utf8_encode($this->attributes['nombre']);
    }
    
    /**
     * The decode to utf8 name.
     *
     * @var string
     * @return void
     */
    public function setNombreAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['nombre'] = utf8_decode($value);
        }
    }
    
    /**
     * return encode to utf8 name.
     *
     * @var string
     * @return string
     */
    public function getApaternoAttribute($value)
    {
        return utf8_encode($this->attributes['apaterno']);
    }
    
    /**
     * The decode to utf8 name.
     *
     * @var string
     * @return void
     */
    public function setApaternoAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['apaterno'] = utf8_decode($value);
        }
    }

    /**
     * return encode to utf8 name.
     *
     * @var string
     * @return string
     */
    public function getAmaternoAttribute($value)
    {
        return utf8_encode($this->attributes['amaterno']);
    }
    
    /**
     * The decode to utf8 name.
     *
     * @var string
     * @return void
     */
    public function setAmaternoAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['amaterno'] = utf8_decode($value);
        }
    }
    
    /**
     * Get the directorEscuelas for the DetallesEscuelas.
     */
    public function directorEscuelas()
    {
        return $this->hasMany('App\Entities\DetalleEscuela', 'academico_id', 'id');
    }

}
