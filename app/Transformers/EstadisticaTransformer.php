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
     * Transform the \Estadistica entity
     * @param \Estadistica $model
     *
     * @return array
     */
    public function transform(Estadistica $model)
    {
        return [
            'id'         => (int) $model->id,
            'links'   => [
                [
                    'rel' => 'self',
                    'uri' => '/v0.1/schools/' . 
                             $model->detalleEscuela->escuela_id . 
                             '/details/' . $model->detalle_escuela_id . 
                             '/stadistics'
                ],
            ],
        ];
    }
}
