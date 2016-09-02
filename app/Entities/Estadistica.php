<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Estadistica extends Model implements Transformable
{
    use TransformableTrait;
    

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'estadisticas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'detalle_escuela_id',
    	'hombres_primero',
		'mujeres_primero',
		'total_primero',
		'hombres_segundo',
		'mujeres_segundo',
		'total_segundo',
		'hombres_tercero',
		'mujeres_tercero',
		'total_tercero',
		'hombres_cuarto',
		'mujeres_cuarto',
		'total_cuarto',
		'hombres_quinto',
		'mujeres_quinto',
		'total_quinto',
		'hombres_sexto',
		'mujeres_sexto',
		'total_sexto',
		'hombres_total',
		'mujeres_total',
		'matricula_total',
		'docentes',
		'grupos',
		'docentes_educacion_fisica',
		'docentes_actividades_artisticas',
		'docentes_actividades_tecnonologicas',
		'docentes_idiomas',
		'personal_administrativo_servicios',
		'director_con_grupo',
		'director_sin_grupo',
		'total_personal',
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
