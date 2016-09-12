<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

use App\Entities\EscuelaAcademico;

/**
 * Class EscuelaAcademicoRepository
 *
 * @package namespace App\Repositories
 */
class EscuelaAcademicoRepository extends Repository implements CacheableInterface {

    use CacheableRepository;
	
	/**
	 * Specify Model class name
	 *
	 * @return mixed
	 */
	public function model() {
        return EscuelaAcademico::class;
    }

}