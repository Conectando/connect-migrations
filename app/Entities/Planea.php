<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Planea extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The table associated with the model.
     *
     * @access protected
     * @var string
     */
    protected $table = 'resultados_planea';

    /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
    protected $fillable = [
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
     *
     * Get the DetalleEscuela record associated with the EscuelaAcademico.
     */
    public function detalleEscuela()
    {
        return $this->hasOne('App\Entities\DetalleEscuela', 'id', 'detalle_escuela_id');
    }

}
