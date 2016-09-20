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

    	$excel = storage_path('app/xlsx/cct_activos.xlsx');
    	
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

                $escuela = DB::table('escuelas')->select()->where($vars)->first();

                try {

                    if(!is_null($escuela)) {
                        DB::table('detalles_escuelas')->insert([
                            'escuela_id'   => $escuela->id,
                            'clave_ct'     => $sheet->clave_ct,
                            'nivel_id'     => $getIdNivel($sheet->nivel),
                            'academico_id' => $getIdAcademico($sheet->director),
                            'programa_id'  => $getIdPrograma($sheet->programa),
                            'turno'        => $sheet->nom_turno,
                            'correo'       => $sheet->correo,
                            'telefono'     => $sheet->telefono,
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
