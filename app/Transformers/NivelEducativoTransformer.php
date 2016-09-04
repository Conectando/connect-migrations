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
                    'uri' => '/v0.1/educational/levels/' . $model->id,
                ],
            ],
        ];
    }
}
