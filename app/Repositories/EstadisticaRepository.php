<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

use App\Entities\Estadistica;
use App\Presenters\EstadisticaPresenter;

/**
 * Class EstadisticaRepository
 *
 * @package namespace App\Repositories
 */
class EstadisticaRepository extends Repository implements CacheableInterface {

    use CacheableRepository;
	
	/**
	 * Specify Model class name
	 *
	 * @return mixed
	 */
	public function model() {
        return Estadistica::class;
    }

    /**
	 * Specify Model class name
	 *
	 * @return mixed
	 */
    public function presenter()
    {
    	return EstadisticaPresenter::class;
    }

}