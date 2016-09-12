<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

use App\Entities\ProgramaEducativo;
use App\Presenters\ProgramaEducativoPresenter;

/**
 * 
 */
class ProgramaEducativoRepository extends Repository implements CacheableInterface {

    use CacheableRepository;
	
	public function model() {
        return ProgramaEducativo::class;
    }

    public function presenter()
    {
    	return ProgramaEducativoPresenter::class;
    }

}