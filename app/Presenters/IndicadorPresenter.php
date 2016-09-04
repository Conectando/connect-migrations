<?php

namespace App\Presenters;

use App\Transformers\IndicadorTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class IndicadorPresenter
 *
 * @package namespace App\Presenters;
 */
class IndicadorPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new IndicadorTransformer();
    }
}
