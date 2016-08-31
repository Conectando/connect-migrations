<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;

/**
 * 
 */
class EstadisticaRepository extends Repository 
{
	
	public function model() {
        return 'App\Entities\Estadistica';
    }

}