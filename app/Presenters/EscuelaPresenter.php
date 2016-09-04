<?php

namespace App\Presenters;

use App\Transformers\EscuelaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EscuelaPresenter
 *
 * @package namespace App\Presenters;
 */
class EscuelaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EscuelaTransformer();
    }
}
