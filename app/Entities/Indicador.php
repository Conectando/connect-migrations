<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Indicador extends Model implements Transformable
{
    use TransformableTrait;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'indicadores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'detalle_escuela_id', 'desercion', 'reprobacion', 
        'reprobacion_regularizados', 'eficiencia'
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
    
}
