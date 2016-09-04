<?php

namespace App\Presenters;

use App\Transformers\ProgramaEducativoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProgramaEducativoPresenter
 *
 * @package namespace App\Presenters;
 */
class ProgramaEducativoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProgramaEducativoTransformer();
    }
}
