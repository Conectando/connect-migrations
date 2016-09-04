<?php

namespace App\Presenters;

use App\Transformers\LocalidadInegiTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LocalidadInegiPresenter
 *
 * @package namespace App\Presenters;
 */
class LocalidadInegiPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LocalidadInegiTransformer();
    }
}
