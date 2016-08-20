<?php

use Illuminate\Database\Seeder;

use App\Academico;
use App\Escuela;
use App\NivelEducativo;
use App\ProgramaEducativo;


class EscuelasSeeder extends Seeder
{

	/**
	 * string 
	 */
	private $excel;

	/**
	 * Illuminate\Database\Eloquent\Collection
	 */
	private $academicos;
	
	/**
	 * Illuminate\Database\Eloquent\Collection
	 */
	private $programas;


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$excel = storage_path('app/excel/listado_cct_activos.xlsx');

    	$academicos = Academico::all();
    	$niveles = NivelEducativo::all();
    	$programas = ProgramaEducativo::all();

    	$getRfcAcademico = function($a) use (&$academicos)
    	{
    		foreach ($academicos as $academico) 
	    	{
	    		if($academico->nombre == $a)
	    		{
	    			return $academico->rfc;
	    		}
	    	}
	    	return null;
    	};

    	$getIdNivel = function($n) use (&$niveles)
    	{
    		foreach ($niveles as $nivel) 
	    	{
	    		if($nivel->nombre == $n)
	    		{
	    			return $nivel->id;
	    		}
	    	}
	    	return null;
    	};

    	$getIdPrograma = function($p) use (&$programas)
    	{
    		foreach ($programas as $programa) 
	    	{
	    		if($programa->nombre == $p)
	    		{
	    			return $programa->id;
	    		}
	    	}
	    	return null;
    	};

        Excel::load($excel, function($reader) use (&$getRfcAcademico, &$getIdNivel, &$getIdPrograma) {

        	// $reader->limit(5);

        	$reader->each(function($sheet) use (&$getRfcAcademico, &$getIdNivel, &$getIdPrograma) {

        		if(!Escuela::where('clave_ct', $sheet->clave_ct)->count()) {

        			$escuela = Escuela::create([
	        			'clave_ct'        => $sheet->clave_ct,
	        			'nombre_ct'       => $sheet->nombre_ct,
	        			'turno'           => $sheet->nom_turno,
	        			'nivel_id'        => $getIdNivel($sheet->nivel),
	        			'programa_id'     => $getIdPrograma($sheet->programa),
	        			'rfc_director'    => $getRfcAcademico($sheet->director),
	        			'correo'          => $sheet->correo,
	        			'telefono'        => $sheet->telefono,
	        			'localidad'       => $sheet->nombre_localidad,
	        			'direccion'       => $sheet->domicilio == 'CONOCIDO' ? 
	        										null : $sheet->domicilio,
	        			'colonia'         => $sheet->nombre_colonia == '0' ? 
	        										null : $sheet->nombre_colonia,
	        			'municipio'       => $sheet->nombre_municipio,
	        			'estado'          => 'JALISCO',
	        			'calle_izquierda' => $sheet->entre_calle == '0' ? 
	        										null : $sheet->entre_calle,
	        			'calle_derecha'   => $sheet->y_calle == '0' ? 
	        										null : $sheet->y_calle,
	        			'codigo_postal'   => $sheet->codigo_postal == '0' ? 
	        										null : $sheet->codigo_postal,
	        			'latitud'         => $sheet->latitud,
	        			'longitud'        => $sheet->longitud

	        		]);

	        		$escuela->save();

				} else {
					echo $sheet->clave_ct . " -> " . $sheet->nombre_ct . "\n";
				}
        		

        	});

		});
    }

}
