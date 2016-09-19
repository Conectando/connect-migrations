<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Planea;

/**
 * Class PlaneaTransformer
 * @package namespace App\Transformers;
 */
class PlaneaTransformer extends TransformerAbstract
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
     * Transform the \Planea entity
     * @param \Planea $model
     *
     * @return array
     */
    public function transform(Planea $model)
    {
        return [
            'size' => $model->alumnos_programados_prueba,
            'subjects_evaluated' => [
                'mathematics' => [
                    [
                        'grade' => 'i',
                        'percentage' => $model->nivel_i_matematicas,
                    ],
                    [
                        'grade' => 'ii',
                        'percentage' => $model->nivel_ii_matematicas,
                    ],
                    [
                        'grade' => 'iii',
                        'percentage' => $model->nivel_iii_matematicas,
                    ],
                    [
                        'grade' => 'iv',
                        'percentage' => $model->nivel_iv_matematicas,
                    ],
                ],
                'literature' => [
                    [
                        'grade' => 'i',
                        'percentage' => $model->nivel_i_lenguaje_y_comunicacion,
                    ],
                    [
                        'grade' => 'ii',
                        'percentage' => $model->nivel_ii_lenguaje_y_comunicacion,
                    ],
                    [
                        'grade' => 'iii',
                        'percentage' => $model->nivel_iii_lenguaje_y_comunicacion,
                    ],
                    [
                        'grade' => 'iv',
                        'percentage' => $model->nivel_iv_lenguaje_y_comunicacion,
                    ],
                ]
            ],
            'evaluated' => [
                'mathematics' => $model->porcentaje_de_evaluados_matematicas,
                'literature'  => $model->porcentaje_de_evaluados_lenguaje_y_comunicacion,
            ],
            'reliability' => [
                'mathematics' => (bool)$model->informacion_poco_confiable_matematicas,
                'literature' => (bool)$model->informacion_poco_confiable_lenguaje_y_comunicacion,
            ],
            'representation' => [
                'mathematics' => (bool)$model->la_prueba_es_representativa_matematicas,
                'literature' => (bool)$model->la_prueba_es_representativa_leguaje_y_comunicacion,
            ],
        ];
    }
}
