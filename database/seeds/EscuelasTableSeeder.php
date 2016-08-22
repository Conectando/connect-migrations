<?php

use Illuminate\Database\Seeder;

use App\{Escuela, NivelEducativo};

class EscuelasTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$excel = storage_path('app/excel/listado_cct_activos.xlsx');

        Excel::load($excel, function($reader) {

        	// $reader->limit(5);

        	$reader->each(function($sheet) {

        		$direccion = $sheet->domicilio == 'CONOCIDO' ? null : $sheet->domicilio;

        		$count = null;

        		if($sheet->codigo_postal == '0') {
        			$count = Escuela::where([
	        			'nombre_ct'     => $sheet->nombre_ct,
	        			'direccion'     => $direccion
	        		])->count();
				} else {
					$count = Escuela::where([
	        			'nombre_ct'     => $sheet->nombre_ct,
	        			'codigo_postal' => $sheet->codigo_postal
	        		])->count();
				}

        		if(!$count) {
        			$escuela = Escuela::create([
	        			'nombre_ct'       => $sheet->nombre_ct,
	        			'correo'          => $sheet->correo,
	        			'telefono'        => $sheet->telefono,
	        			'direccion'       => $direccion,
	        			'colonia'         => $sheet->nombre_colonia == '0' ? null : $sheet->nombre_colonia,
	        			'municipio'       => $sheet->nombre_municipio,
	        			'localidad'       => $sheet->nombre_localidad,
	        			'estado'          => 'JALISCO',
	        			'calle_izquierda' => $sheet->entre_calle == '0' ? null : $sheet->entre_calle,
	        			'calle_derecha'   => $sheet->y_calle == '0' ? null : $sheet->y_calle,
	        			'codigo_postal'   => $sheet->codigo_postal == '0' ? null : $sheet->codigo_postal,
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
