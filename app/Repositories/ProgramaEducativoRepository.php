<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;

/**
 * 
 */
class ProgramaEducativoRepository extends Repository 
{
	
	public function model() {
        return 'App\Entities\ProgramaEducativo';
    }

}