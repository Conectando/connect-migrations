<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

use App\Entities\DetalleEscuela;
use App\Presenters\DetalleEscuelaPresenter;

/**
 * Class DetalleEscuelaRepository
 *
 * @package namespace App\Repositories
 */
class DetalleEscuelaRepository extends Repository implements CacheableInterface {

    use CacheableRepository;
	
	/**
	 * Specify Model class name
	 *
	 * @return mixed
	 */
	public function model() {
        return DetalleEscuela::class;
    }

    /**
     * Specify Presenter class name
     *
     * @return mixed
     */
    public function presenter()
    {
    	return DetalleEscuelaPresenter::class;
    }

}