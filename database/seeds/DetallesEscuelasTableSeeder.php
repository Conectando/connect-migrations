<?php

use Illuminate\Database\Seeder;

class DetallesEscuelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$excel = storage_path('app/xlsx/cct_listado_activos.xlsx');
    	
        $niveles = DB::table('niveles_educativos')->select()->get();
        $programas = DB::table('programas_educativos')->select()->get();

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


        $getIdAcademico = function($a) use (&$academicos)
        {
            if($a == '0' | 
                    $a == 'NO ASIGNADO' | 
                    $a == 'ASIGNADO')
                return null;

            $academico = DB::table('academicos')->select()->where('nombre', $a)->first();
            return is_null($academico) ? $academico : $academico->id; 
        };


        Excel::load($excel, function($reader) use (&$getIdNivel, &$getIdPrograma, &$getIdAcademico) {

            $count = 0;

            // $reader->limit(1000);

            $reader->each(function($sheet) use (&$getIdNivel, &$getIdPrograma, &$getIdAcademico, &$count) {
                
                $direccion = ($sheet->domicilio == 'CONOCIDO' || $sheet->domicilio == 'CONOCIDA') ? 'undefined' : $sheet->domicilio;
                $colonia = $sheet->nombre_colonia == '0' ? 'undefined' : $sheet->nombre_colonia;
                $calleDerecha = $sheet->entre_calle == '0' ? 'undefined' : $sheet->entre_calle;
                $calleIzquierda = $sheet->y_calle == '0' ? 'undefined' : $sheet->y_calle;
                $codigoPostal = (int) $sheet->codigo_postal;
                $correo = $sheet->correo == '0' ? 'undefined' : $sheet->correo;
                $telefono = $sheet->telefono == '0' ? 'undefined' : $sheet->telefono;

                $escuela = DB::table('escuelas')->select()->where([
                    // 'nombre_ct' => utf8_decode($sheet->nombre_ct),
                    // 'direccion' => utf8_decode($direccion),
                    // 'colonia' => utf8_decode($colonia),
                    // 'calle_derecha' => utf8_decode($calleDerecha),
                    //'calle_izquierda' => utf8_decode($calleIzquierda),
                    'codigo_postal' => $codigoPostal,
                    'municipio_inegi_id' => (int) $sheet->municipio_clave_inegi,
                    'localidad_inegi_id' => (int) $sheet->localidad_inegi,
                    'latitud'            => (double) $sheet->latitud,
                    'longitud'           => (double) $sheet->longitud,
                ])->first();

                try {

                    if(!is_null($escuela)) {
                        DB::table('detalles_escuelas')->insert([
                            'escuela_id'   => $escuela->id,
                            'clave_ct'     => $sheet->clave_ct,
                            'nivel_id'     => $getIdNivel($sheet->nivel),
                            'academico_id' => $getIdAcademico($sheet->director),
                            'programa_id'  => $getIdPrograma($sheet->programa),
                            'turno'        => $sheet->nom_turno,
                            'correo'       => $correo,
                            'telefono'     => $telefono,
                            'zona'         => $sheet->zona_escolar,
                            'sector'       => $sheet->sector,
                            'sotenimiento' => $sheet->nom_sost,
                            'created_at'   => \Carbon\Carbon::now()->toDateTimeString(),
                            'updated_at'   => \Carbon\Carbon::now()->toDateTimeString(),
                        ]);
                    } else {
                        $count++;
                    }

                } catch(\Exception $ex) {
                    echo "----------------------------------------\n";
                    echo $ex->getMessage() . "\n";
                }

            });

            echo "----------------------------------------\n";
            echo "Not found schools > " . $count;

        });

    }
}
