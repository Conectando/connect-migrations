<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\MunicipioInegi;

/**
 * Class MunicipioInegiTransformer
 * @package namespace App\Transformers;
 */
class MunicipioInegiTransformer extends TransformerAbstract
{

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
    ];

    /**
     * Transform the \MunicipioInegi entity
     * @param \MunicipioInegi $model
     *
     * @return array
     */
    public function transform(MunicipioInegi $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->nombre,
            'links'   => [
                [
                    'rel' => 'self',
                    'href' => '/api/v0.1/inegi/municipalities/' . $model->id,
                ],
            ],
        ];
    }
}
