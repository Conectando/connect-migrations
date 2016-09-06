<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * 
 */
class AcademicoRepository extends Repository implements CacheableInterface 
{

    use CacheableRepository;
	
	public function model() {
        return 'App\Entities\Academico';
    }

    public function presenter()
    {
        return "App\\Presenters\\AcademicoPresenter";
    }

}