<?php

namespace App\Presenters;

use App\Transformers\PlaneaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PlaneaPresenter
 *
 * @package namespace App\Presenters;
 */
class PlaneaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PlaneaTransformer();
    }
}
