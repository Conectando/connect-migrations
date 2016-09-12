<?php 

namespace App\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository as Repository;
use Prettus\Repository\Traits\CacheableRepository;

use App\Entities\Escuela;
use App\Presenters\EscuelaPresenter;

/**
 * Class EscuelaRepository
 *
 * @package namespace App\Repositories
 */
class EscuelaRepository extends Repository implements CacheableInterface {

    use CacheableRepository;
	
    /**
     * Campos que pueden ser buscados por RequestCriteria
     *
     * @var array
     * @access protected
     */
    protected $fieldSearchable = [
        'nombre_ct',
    ];

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot(){
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
	public function model() {
        return Escuela::class;
    }

    /**
     * Specify Presenter class name
     *
     * @return mixed
     */
    public function presenter()
    {
    	return EscuelaPresenter::class;
    }

}