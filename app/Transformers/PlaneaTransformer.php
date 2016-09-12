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
     * Transform the \Planea entity
     * @param \Planea $model
     *
     * @return array
     */
    public function transform(Planea $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
