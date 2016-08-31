<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;

/**
 * 
 */
class NivelEducativoRepository extends Repository 
{
	
	public function model() {
        return 'App\Entities\NivelEducativo';
    }

}