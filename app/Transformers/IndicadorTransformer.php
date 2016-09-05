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
            'id'         => (int) $model->id,
            'links'   => [
                [
                    'rel' => 'self',
                    'href' => '/v0.1/schools/' . 
                             $model->detalleEscuela->escuela_id . 
                             '/details/' . $model->detalle_escuela_id . 
                             '/indicators'
                ],
            ],
        ];
    }
}
