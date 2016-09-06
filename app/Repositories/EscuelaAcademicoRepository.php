<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * 
 */
class EscuelaAcademicoRepository extends Repository implements CacheableInterface {

    use CacheableRepository;
	
	public function model() {
        return 'App\Entities\EscuelaAcademico';
    }

}