<?php

namespace App\Presenters;

use App\Transformers\NivelEducativoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class NivelEducativoPresenter
 *
 * @package namespace App\Presenters;
 */
class NivelEducativoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new NivelEducativoTransformer();
    }
}
