<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\NivelEducativo;

/**
 * Class NivelEducativoTransformer
 * @package namespace App\Transformers;
 */
class NivelEducativoTransformer extends TransformerAbstract
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
     * Transform the \NivelEducativo entity
     * @param \NivelEducativo $model
     *
     * @return array
     */
    public function transform(NivelEducativo $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->nombre,
            'links'   => [
                [
                    'rel' => 'self',
                    'href' => '/api/v0.1/educational/levels/' . $model->id,
                ],
            ],
        ];
    }
}
