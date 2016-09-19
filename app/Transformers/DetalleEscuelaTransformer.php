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
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'indicator',
        'statistic',
        'plan',
    ];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        // 'indicator',
        // 'statistic',
        // 'plan',
    ];

    /**
     * Transform the \DetalleEscuela entity
     * @param \DetalleEscuela $model
     *
     * @return array
     */
    public function transform(DetalleEscuela $model)
    {
        $transform = [
            'id'         => (int) $model->id,
            'key'        => $model->clave_ct,
            'turn'       => $model->turno,
            'email'      => $model->correo,
            'telephone'  => $model->telefono,
            'zone'       => (int) $model->zona,
            'sector'     => (int) $model->sector,
            'level'      => $model->nivel->nombre,
            'program'    => $model->programa->nombre,
            'sustenance' => $model->sotenimiento,
            'links'   => [
                'self' => '/api/v0.1/schools/' . $model->escuela_id . '/details/' . $model->id,
                'indicators' => '/api/v0.1/schools/' . $model->escuela_id . '/details/' . $model->id . '/indicators',
                'statistics'  => '/api/v0.1/schools/' . $model->escuela_id . '/details/' . $model->id . '/statistics',
                'plans'  => '/api/v0.1/schools/' . $model->escuela_id . '/details/' . $model->id . '/plans',
                'teachers' => '/api/v0.1/schools/' . $model->escuela_id . '/details/' . $model->id . '/teachers',
                'director' => null,
            ]
        ];

        if(is_null($model->planea))
        {
            $transform['links']['plans'] = null; 
        }

        if(!is_null($model->academico_id))
        {
            $transform['links']['director'] = '/api/v0.1/academics/' . $model->academico_id;
        } 

        return $transform;
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
     * Include Plan
     *
     * @param App\Entities\Escuela $detalleEscuela
     * @return \League\Fractal\Resource\Item
     */
    public function includePlan(DetalleEscuela $detalleEscuela)
    {
        $plan = $detalleEscuela->planea;
        return is_null($plan) ? $plan : $this->item($plan, new PlaneaTransformer);
    }

    /**
     * Include Statisctic
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
