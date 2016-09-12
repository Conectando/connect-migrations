<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

use App\Entities\Indicador;
use App\Presenters\IndicadorPresenter;

/**
 * Class IndicadorRepository
 *
 * @package namespace App\Repositories
 */
class IndicadorRepository extends Repository implements CacheableInterface {

    use CacheableRepository;
	
    /**
     * Specify Model class name
     * 
     * @return mixed
     */
	public function model() {
        return Indicador::class;
    }

	/**
	 * Specify Presenter class name
	 * 
	 * @return mixed
	 */
	public function presenter()
    {
    	return IndicadorPresenter::class;
    }

}