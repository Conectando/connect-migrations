<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * 
 */
class MunicipioInegiRepository extends Repository implements CacheableInterface {

    use CacheableRepository;
	
	public function model() {
        return 'App\Entities\MunicipioInegi';
    }

    public function presenter()
    {
    	return 'App\Presenters\MunicipioInegiPresenter';
    }

}