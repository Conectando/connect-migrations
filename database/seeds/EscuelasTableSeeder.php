<?php

use Illuminate\Database\Seeder;

class EscuelasTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$excel = storage_path('app/xlsx/cct_listado_activos.xlsx');

        // $escuelas = [];

        Excel::load($excel, function($reader) {

            $count = 0;

        	$reader->each(function($sheet) use (&$count) {

                $nombre_ct = trim(utf8_decode($sheet->nombre_ct));
        		$direccion = ($sheet->domicilio == 'CONOCIDO' || $sheet->domicilio == 'CONOCIDA') ? 'undefined' : trim(utf8_decode($sheet->domicilio));
                $colonia = $sheet->nombre_colonia == '0' ? 'undefined' : trim(utf8_decode($sheet->nombre_colonia));
                $calleDerecha = $sheet->entre_calle == '0' ? 'undefined' : trim(utf8_decode($sheet->entre_calle));
                $calleIzquierda = $sheet->y_calle == '0' ? 'undefined' : trim(utf8_decode($sheet->y_calle));
                $codigoPostal = (int) $sheet->codigo_postal;

                $vars = array();

                array_push($vars, 
                    ['nombre_ct', 'like', '%' . $nombre_ct . '%'],
                    // 'direccion' => $direccion,
                    // 'colonia' => $colonia,
                    // 'calle_derecha' => $calleDerecha,
                    // 'calle_izquierda' => $calleIzquierda,
                    ['codigo_postal'     , '=', (int) $codigoPostal],
                    ['municipio_inegi_id', '=', (int) $sheet->municipio_clave_inegi],
                    ['localidad_inegi_id', '=', (int) $sheet->localidad_inegi],
                    ['latitud'           , '=', (double) $sheet->latitud],
                    ['longitud'          , '=', (double) $sheet->longitud]);

        		$escuelas_count = DB::table('escuelas')->select()->where($vars)->count();

        		if($escuelas_count == 0) {
        			
        			DB::table('escuelas')->insert([
	        			'nombre_ct'       => $nombre_ct,
	        			'direccion'       => $direccion,
	        			'colonia'         => $colonia,
	        			'calle_derecha'   => $calleDerecha,
	        			'calle_izquierda' => $calleIzquierda,
	        			'codigo_postal'   => (int) $codigoPostal,
	        			'municipio_inegi_id' => (int) $sheet->municipio_clave_inegi,
	        			'localidad_inegi_id' => (int) $sheet->localidad_inegi,
	        			'estado'          => 'JALISCO',
	        			'latitud'         => (double) $sheet->latitud,
	        			'longitud'        => (double) $sheet->longitud,
                        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
	        		]);

				} else {
                    // echo "----------------------------------------\n";
                    // echo "nombre_ct -> " . $sheet->nombre_ct . "\n";
                    // echo "direccion -> " . $direccion . "\n";
                    // echo "colonia -> " . $colonia . "\n";
                    // echo "calle_derecha -> " . $calleDerecha . "\n";
                    // echo "calle_izquierda -> " . $calleIzquierda . "\n";
                    // echo "codigo_postal -> " . $codigoPostal . "\n";
                    // echo "municipio_inegi_id -> " . (int) $sheet->municipio_clave_inegi . "\n";
                    // echo "localidad_inegi_id" . (int) $sheet->localidad_inegi . "\n";
                    // echo "latitud -> " . (double) $sheet->latitud . "\n";
                    // echo "longitud -> " . (double) $sheet->longitud . "\n";
                    $count++;
                }

        	});

            echo "----------------------------------------\n";
            echo "Total repeats schools " . $count . "\n";

		});
    }

}
