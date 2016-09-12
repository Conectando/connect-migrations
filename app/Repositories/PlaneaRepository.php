<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PlaneaRepository;
use App\Entities\Planea;
use App\Presenters\PlaneaPresenter;
use App\Validators\PlaneaValidator;

/**
 * Class PlaneaRepositoryEloquent
 *
 * @package namespace App\Repositories
 */
class PlaneaRepository extends Repository
{

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Planea::class;
    }

    /**
     * Specify Presenter class name
     *
     * @return mixed
     */
    public function presenter()
    {
        return PlaneaPresenter::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PlaneaValidator::class;
    }
    
}
