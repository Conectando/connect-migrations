<?php

namespace App\Presenters;

use App\Transformers\AcademicoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AcademicoPresenter
 *
 * @package namespace App\Presenters;
 */
class AcademicoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AcademicoTransformer();
    }
}
