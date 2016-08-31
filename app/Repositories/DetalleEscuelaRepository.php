<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;

/**
 * 
 */
class DetalleEscuelaRepository extends Repository 
{
	
	public function model() {
        return 'App\Entities\DetalleEscuela';
    }

}