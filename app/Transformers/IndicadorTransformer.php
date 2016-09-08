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
     * Transform the \Indicador entity
     *
     * @param \App\Entities\Indicador $model
     * @return array
     */
    public function transform(Indicador $model)
    {
        return [
            'desertion' => (double) $model->desercion,
            'reprobation' => [
                'ordinary' => (double) $model->reprobacion,
                'regularization' => (double) $model->reprobacion_regularizados,
            ],
            'efficiency' => (double) $model->eficiencia,
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
