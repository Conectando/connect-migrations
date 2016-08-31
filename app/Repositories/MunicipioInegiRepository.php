<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;

/**
 * 
 */
class MunicipioInegiRepository extends Repository 
{
	
	public function model() {
        return 'App\Entities\MunicipioInegi';
    }

}