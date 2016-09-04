<?php

namespace App\Presenters;

use App\Transformers\DetalleEscuelaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DetalleEscuelaPresenter
 *
 * @package namespace App\Presenters;
 */
class DetalleEscuelaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DetalleEscuelaTransformer();
    }
}
