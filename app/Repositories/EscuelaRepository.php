<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;

/**
 * 
 */
class EscuelaRepository extends Repository 
{
	
	public function model() {
        return 'App\Entities\Escuela';
    }

}