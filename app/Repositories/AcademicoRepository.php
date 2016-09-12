<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;
use Prettus\Validator\Contracts\ValidatorInterface;

use App\Entities\Academico;
use App\Presenters\AcademicoPresenter;
use App\Validators\AcademicoValidator;

/**
 * Class AcademicoRepository
 * @package namespace App\Repositories
 */
class AcademicoRepository extends Repository implements CacheableInterface 
{

    use CacheableRepository;
	
    /**
     * Specify Entity class name
     *
     * @return mixed
     */
	public function model() {
        return Academico::class;
    }

    /**
     * Specify Presenter class name
     *
     * @return mixed
     */
    public function presenter()
    {
        return AcademicoPresenter::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return AcademicoValidator::class;
    }

}