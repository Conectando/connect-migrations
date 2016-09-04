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
                [
                    'rel' => 'self',
                    'uri' => '/v0.1/inegi/locations/' . $model->id,
                ],
            ],
        ];
    }
}