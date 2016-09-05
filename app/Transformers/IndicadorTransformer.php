<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Indicador;

/**
 * Class IndicadorTransformer
 * @package namespace App\Transformers;
 */
class IndicadorTransformer extends TransformerAbstract
{

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
    ];

    /**
     * Transform the \Indicador entity
     *
     * @param \App\Entities\Indicador $model
     * @return array
     */
    public function transform(Indicador $model)
    {
        return [
            'desercion' => (double) $model->desercion,
            'reprobacion' => [
                'ordinaria' => (double) $model->reprobacion,
                'regularizados' => (double) $model->reprobacion_regularizados,
            ],
            'eficiencia' => (double) $model->eficiencia,
            'links'   => [
                [
                    'rel' => 'self',
                    'href' => '/api/v0.1/schools/' . 
                             $model->detalleEscuela->escuela_id . 
                             '/details/' . $model->detalle_escuela_id . 
                             '/indicators'
                ],
            ],
        ];
    }
}
