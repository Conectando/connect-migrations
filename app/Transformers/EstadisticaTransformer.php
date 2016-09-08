<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Estadistica;

/**
 * Class EstadisticaTransformer
 * @package namespace App\Transformers;
 */
class EstadisticaTransformer extends TransformerAbstract
{

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
    ];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
    ];

    /**
     * Transform the \Estadistica entity
     * @param \Estadistica $model
     *
     * @return array
     */
    public function transform(Estadistica $model)
    {
        return [
            'students'   => [
                'first' => [
                    'mens'  => (int) $model->hombres_primero,
                    'women' => (int) $model->mujeres_primero,
                    'tatal' => (int) $model->total_primero,
                ],
                'second' => [
                    'mens'  => (int) $model->hombres_segundo,
                    'women' => (int) $model->mujeres_segundo,
                    'tatal' => (int) $model->total_segundo,
                ],
                'third' => [
                    'mens'  => (int) $model->hombres_tercero,
                    'women' => (int) $model->mujeres_tercero,
                    'tatal' => (int) $model->total_tercero,
                ],
                'fourth' => [
                    'mens'  => (int) $model->hombres_cuarto,
                    'women' => (int) $model->mujeres_cuarto,
                    'tatal' => (int) $model->total_cuarto,
                ],
                'fifth' => [
                    'mens'  => (int) $model->hombres_quinto,
                    'women' => (int) $model->mujeres_quinto,
                    'tatal' => (int) $model->total_quinto,
                ],
                'sixth' => [
                    'mens'  => (int) $model->hombres_sexto,
                    'women' => (int) $model->mujeres_sexto,
                    'tatal' => (int) $model->total_sexto,
                ],
                'total_men' => (int) $model->total_hombres,
                'total_women' => (int) $model->total_mujeres,
                'total' => (int) $model->matricula_total,
            ],
            'employees' => [
                'teachers' => [
                    'general' => (int) $model->docentes,
                    'physical_education' => (int) $model->docentes_educacion_fisica,
                    'artistic_activities' => (int) $model->docentes_actividades_artisticas,
                    'technological_activities' => (int) $model->docentes_actividades_tecnonologicas,
                    'language' => (int) $model->docentes_idiomas,
                ],
                // 'directors' => [
                    
                // ],
                'administrative' => (int) $model->personal_administrativo_servicios,
                'total' => (int) $model->total_personal,
            ],
            'groups' => (int) $model->grupos,
            'links'   => [
                [
                    'rel' => 'self',
                    'href' => '/api/v0.1/schools/' . 
                             $model->detalleEscuela->escuela_id . 
                             '/details/' . $model->detalle_escuela_id . 
                             '/statistics'
                ],
            ],
        ];
    }
}
