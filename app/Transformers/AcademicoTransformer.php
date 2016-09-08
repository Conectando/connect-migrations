<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Academico;

/**
 * Class AcademicoTransformer
 * @package namespace App\Transformers;
 */
class AcademicoTransformer extends TransformerAbstract
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
     * Transform the \Academico entity
     * @param \Academico $model
     *
     * @return array
     */
    public function transform(Academico $model)
    {
        return [
            'id'                => (int) $model->id,
            'rfc'               => $model->rfc,
            'name'              => $model->nombre,
            'last_name'         => $model->apaterno,
            'second_last_name'  => $model->amaterno,
            'email'             => $model->correo,
            'telephone'         => $model->telefono,
            'mobile_phone'      => $model->celular,
            'links'   => [
                [
                    'rel' => 'self',
                    'href' => '/api/v0.1/academics/' . $model->id,
                ],
            ]
        ];
    }
}
