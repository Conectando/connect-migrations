<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;

/**
 * 
 */
class IndicadorRepository extends Repository 
{
	
	public function model() {
        return 'App\Entities\Indicador';
    }

}