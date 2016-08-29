<?php 

namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

/**
 * 
 */
class DetalleEscuelaRepository extends Repository 
{
	
	public function model() {
        return 'App\DetalleEscuela';
    }

}