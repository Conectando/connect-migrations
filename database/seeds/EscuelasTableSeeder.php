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

        		$direccion = ($sheet->domicilio == 'CONOCIDO' || $sheet->domicilio == 'CONOCIDA') ? 'undefined' : $sheet->domicilio;
                $colonia = $sheet->nombre_colonia == '0' ? 'undefined' : $sheet->nombre_colonia;
                $calleDerecha = $sheet->entre_calle == '0' ? 'undefined' : $sheet->entre_calle;
                $calleIzquierda = $sheet->y_calle == '0' ? 'undefined' : $sheet->y_calle;
                $codigoPostal = (int) $sheet->codigo_postal;
                

        		$escuelas_count = DB::table('escuelas')->select()->where([
                    // 'nombre_ct' => utf8_decode($sheet->nombre_ct),
                    // 'direccion' => utf8_decode($direccion),
                    // 'colonia' => utf8_decode($colonia),
                    // 'calle_derecha' => utf8_decode($calleDerecha),
                    // 'calle_izquierda' => utf8_decode($calleIzquierda),
                    'codigo_postal' => $codigoPostal,
                    'municipio_inegi_id' => (int) $sheet->municipio_clave_inegi,
                    'localidad_inegi_id' => (int) $sheet->localidad_inegi,
                    'latitud'            => (double) $sheet->latitud,
                    'longitud'           => (double) $sheet->longitud,
                ])->count();

        		if($escuelas_count == 0) {
        			
        			DB::table('escuelas')->insert([
	        			'nombre_ct'       => utf8_decode($sheet->nombre_ct),
	        			'direccion'       => utf8_decode($direccion),
	        			'colonia'         => utf8_decode($colonia),
	        			'calle_derecha'   => utf8_decode($calleDerecha),
	        			'calle_izquierda' => utf8_decode($calleIzquierda),
	        			'codigo_postal'   => $codigoPostal,
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
