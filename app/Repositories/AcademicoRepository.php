<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;

/**
 * 
 */
class AcademicoRepository extends Repository 
{
	
	public function model() {
        return 'App\Entities\Academico';
    }

    public function presenter()
    {
        return "App\\Presenters\\AcademicoPresenter";
    }

}