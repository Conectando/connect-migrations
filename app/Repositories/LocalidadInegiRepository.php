<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;

/**
 * 
 */
class LocalidadInegiRepository extends Repository 
{
	
	public function model() {
        return 'App\Entities\LocalidadInegi';
    }

    public function presenter()
    {
    	return 'App\Presenters\LocalidadInegiPresenter';
    }

}