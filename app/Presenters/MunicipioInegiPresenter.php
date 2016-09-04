<?php

namespace App\Presenters;

use App\Transformers\MunicipioInegiTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MunicipioInegiPresenter
 *
 * @package namespace App\Presenters;
 */
class MunicipioInegiPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MunicipioInegiTransformer();
    }
}
