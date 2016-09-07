<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;
use Prettus\Validator\Contracts\ValidatorInterface;

/**
 * 
 */
class AcademicoRepository extends Repository implements CacheableInterface 
{

    use CacheableRepository;
	
    /**
     * Specify ENtity class name
     *
     * @return mixed
     */
	public function model() {
        return 'App\Entities\Academico';
    }

    /**
     * Specify Presenter class name
     *
     * @return mixed
     */
    public function presenter()
    {
        return "App\\Presenters\\AcademicoPresenter";
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return "App\\Validators\\AcademicoValidator";
    }

}