<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\DetalleEscuela;

/**
 * Class DetalleEscuelaTransformer
 * @package namespace App\Transformers;
 */
class DetalleEscuelaTransformer extends TransformerAbstract
{

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
    ];

    /**
     * Transform the \DetalleEscuela entity
     * @param \DetalleEscuela $model
     *
     * @return array
     */
    public function transform(DetalleEscuela $model)
    {
        return [
            'id'         => (int) $model->id,
            'key'        => $model->clave_ct,
            'turn'       => $model->turno,
            'email'      => $model->correo,
            'telephone'  => $model->telefono,
            'zone'       => $model->zona,
            'sector'     => $model->sector,
            'sustenance' => $model->sotenimiento,
            'links'   => [
                [
                    'rel' => 'self',
                    'uri' => '/v0.1/schools/' . $model->escuela_id . '/details/' . $model->id,
                ],
                [
                    'rel' => 'indicators',
                    'uri' => '/v0.1/schools/' . $model->escuela_id . '/details/' . $model->id . '/indicators',
                ],
                [
                    'rel' => 'statistics',
                    'uri' => '/v0.1/schools/' . $model->escuela_id . '/details/' . $model->id . '/statistics',
                ],
                [
                    'rel' => 'teachers',
                    'uri' => '/v0.1/schools/' . $model->escuela_id . '/details/' . $model->id . '/teachers',
                ],
            ]
        ];
    }

    /**
     * Include Indicator
     *
     * @param App\Entities\Escuela $detalleEscuela
     * @return \League\Fractal\Resource\Item
     */
    public function includeIndicator(DetalleEscuela $detalleEscuela)
    {
        $indicator = $detalleEscuela->indicador;

        return $this->item($indicator, new IndicadorTransformer);
    }


    /**
     * Include Indicator
     *
     * @param App\Entities\Escuela $detalleEscuela
     * @return \League\Fractal\Resource\Item
     */
    public function includeStatistic(DetalleEscuela $detalleEscuela)
    {
        $statistic = $detalleEscuela->estadistica;

        return $this->item($statistic, new EstadisticaTransformer);
    }

}
