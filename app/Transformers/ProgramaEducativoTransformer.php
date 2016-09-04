<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ProgramaEducativo;

/**
 * Class ProgramaEducativoTransformer
 * @package namespace App\Transformers;
 */
class ProgramaEducativoTransformer extends TransformerAbstract
{

    /**
     * Transform the \ProgramaEducativo entity
     * @param \ProgramaEducativo $model
     *
     * @return array
     */
    public function transform(ProgramaEducativo $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->nombre,
            'links'   => [
                [
                    'rel' => 'self',
                    'uri' => '/v0.1/educational/programs/' . $model->id,
                ],
            ],
        ];
    }
}
