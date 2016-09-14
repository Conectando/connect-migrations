<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\LocalidadInegi;

/**
 * Class LocalidadInegiTransformer
 * @package namespace App\Transformers;
 */
class LocalidadInegiTransformer extends TransformerAbstract
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
     * Transform the \LocalidadInegi entity
     * @param \LocalidadInegi $model
     *
     * @return array
     */
    public function transform(LocalidadInegi $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->nombre,
            'links'   => [
                'self' => '/api/v0.1/inegi/locations/' . $model->id,
            ],
        ];
    }
}
