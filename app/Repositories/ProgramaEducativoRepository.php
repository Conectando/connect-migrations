<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * 
 */
class ProgramaEducativoRepository extends Repository implements CacheableInterface {

    use CacheableRepository;
	
	public function model() {
        return 'App\Entities\ProgramaEducativo';
    }

    public function presenter()
    {
    	return 'App\Presenters\ProgramaEducativoPresenter';
    }

}