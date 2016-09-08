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
                    'href' => '/api/v0.1/educational/programs/' . $model->id,
                ],
            ],
        ];
    }
}
