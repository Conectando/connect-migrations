<?php

namespace App\Presenters;

use App\Transformers\EstadisticaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EstadisticaPresenter
 *
 * @package namespace App\Presenters;
 */
class EstadisticaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EstadisticaTransformer();
    }
}
