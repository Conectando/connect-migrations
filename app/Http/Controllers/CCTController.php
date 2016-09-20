<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Psr\Http\Message\ServerRequestInterface;

class CCTController extends Controller
{

	
	/**
	 * @var ServerRequestInterface
	 */
	private $request;

	/**
	 * @var array
	 */
	protected $availableFileNames = [
		'activos',
		'estadisticas',
		'indicadores',
		'planea',
	];

    protected $availableExtensions = [
        'csv',
        'json',
        'xlsx'
    ];

	/**
	 * 
	 */
	public function __construct(ServerRequestInterface $request)
	{
		$this->request = $request;
	}
    
    /**
     * 
     */
    public function index($filename) 
    {

    	$path = $this->isValidFileName($filename);
    	
    	$limit = $this->getLimitParam();

        $offset = $this->getOffsetParam();
            
        return \Excel::load($path, function($reader) use (&$limit, &$offset) {
        	$reader->limit($limit, $offset);
        })->get();
    }

    /**
     * 
     */
    public function download($filename)
    {
        $type = $this->getExtensionType();
    	$path = $this->isValidFileName($filename, $type);

    	return \Response::download($path);
    }

    /**
     * 
     */
    private function isValidFileName($filename, $type)
    {
    	if(!in_array($filename, $this->availableFileNames) || !in_array($type, $this->availableExtensions))
			abort(404);
		else
			return storage_path('app/' . $type . '/cct_' . $filename . '.' . $type);
    }

    private function getExtensionType()
    {
        $queryParams = $this->request->getQueryParams();
        return array_key_exists('type', $queryParams) ? $queryParams['type'] : 'json';
    }

    /**
     *
     */
    private function getLimitParam()
    {
    	$queryParams = $this->request->getQueryParams();
    	return array_key_exists('limit', $queryParams) ? (is_numeric($queryParams['limit']) ? ($queryParams['limit'] < 1 ? 30 : ((int) $queryParams['limit'])) : 30 ) : 30;
    }

    /**
     *
     */
    private function getOffsetParam()
    {
    	$queryParams = $this->request->getQueryParams();
    	return array_key_exists('offset', $queryParams) ? (is_numeric($queryParams['offset']) ? ($queryParams['offset'] < 1 ? 0 : ((int)$queryParams['offset'])) : 0 ) : 0;
    }

}

