<?php

use Illuminate\Database\Seeder;

class ResultadosPlaneaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$excel = storage_path('app/xlsx/cct_planea.xlsx');
    	
        $niveles = DB::table('niveles_educativos')->select()->get();
        
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

        $getDetalleEscuela = function($clave_ct, $turno, $nivel_id)
        {
            return  DB::table('detalles_escuelas')
            				->select()
            				->where([
            					'clave_ct' => $clave_ct,
                                'turno' => $turno,
            					'nivel_id' => $nivel_id,
            				])->first();
        };


        Excel::load($excel, function($reader) use (&$getIdNivel, &$getDetalleEscuela)
        {

            $count = 0;

            // $reader->limit(1000);

            $reader->each(function($sheet) use (&$getIdNivel, &$getDetalleEscuela, &$count) {

                $clave = $sheet->clave_de_la_escuela;
                $turno = $sheet->turno == 'COMPLETO' ? 'CONTINUO (TIEMPO COMPLETO)' : $sheet->turno; 
                $nivel = $getIdNivel($sheet->nivel);

                $detalleEscuela = $getDetalleEscuela($clave, $turno, $nivel);

                if(is_null($detalleEscuela) && $turno == 'CONTINUO (TIEMPO COMPLETO)')
                {
                    $detalleEscuela = $getDetalleEscuela($clave, 'CONTINUO (JORNADA AMPLIADA)', $nivel);
                }                    

                try {

                    if(!is_null($detalleEscuela)) {
                    	DB::table('resultados_planea')->insert([
                            'detalle_escuela_id' => $detalleEscuela->id,
                            'alumnos_programados_prueba' => is_numeric($sheet->alumnos_programados_prueba) ? $sheet->alumnos_programados_prueba : 0,
						    'porcentaje_de_evaluados_lenguaje_y_comunicacion' => is_numeric($sheet->porcentaje_de_evaluados_lenguaje_y_comunicacion) ? $sheet->porcentaje_de_evaluados_lenguaje_y_comunicacion : 0.0,
						    'porcentaje_de_evaluados_matematicas' => is_numeric($sheet->porcentaje_de_evaluados_matematicas) ? $sheet->porcentaje_de_evaluados_matematicas : 0.0,
						    'la_prueba_es_representativa_leguaje_y_comunicacion' => $sheet->la_prueba_es_representativa_leguaje_y_comunicacion == 'SI' ? true : false,
						    'la_prueba_es_representativa_matematicas' => $sheet->la_prueba_es_representativa_matematicas == 'SI' ? true : false,
						    'informacion_poco_confiable_lenguaje_y_comunicacion' => $sheet->informacion_poco_confiable_lenguaje_y_comunicacion == 'SI' ? true : false,
						    'informacion_poco_confiable_matematicas' => $sheet->informacion_poco_confiable_matematicas == 'SI' ? true : false,
						    'nivel_i_lenguaje_y_comunicacion' => is_numeric($sheet->nivel_i_lenguaje_y_comunicacion) ? $sheet->nivel_i_lenguaje_y_comunicacion : 0.0 ,
						    'nivel_ii_lenguaje_y_comunicacion' => is_numeric($sheet->nivel_ii_lenguaje_y_comunicacion) ? $sheet->nivel_ii_lenguaje_y_comunicacion : 0.0 ,
						    'nivel_iii_lenguaje_y_comunicacion' => is_numeric($sheet->nivel_iii_lenguaje_y_comunicacion) ? $sheet->nivel_iii_lenguaje_y_comunicacion : 0.0 ,
						    'nivel_iv_lenguaje_y_comunicacion' => is_numeric($sheet->nivel_iv_lenguaje_y_comunicacion) ? $sheet->nivel_iv_lenguaje_y_comunicacion : 0.0 ,
						    'nivel_predominante_lenguaje_y_comunicacion' => $sheet->nivel_predominante_lenguaje_y_comunicacion,
						    'nivel_i_matematicas' => is_numeric($sheet->nivel_i_matematicas) ? $sheet->nivel_i_matematicas : 0.0 ,
						    'nivel_ii_matematicas' => is_numeric($sheet->nivel_ii_matematicas) ? $sheet->nivel_ii_matematicas : 0.0 ,
						    'nivel_iii_matematicas' => is_numeric($sheet->nivel_iii_matematicas) ? $sheet->nivel_iii_matematicas : 0.0 ,
						    'nivel_iv_matematicas' => is_numeric($sheet->nivel_iv_matematicas) ? $sheet->nivel_iv_matematicas : 0.0 ,
						    'nivel_predominante_matematicas' => $sheet->nivel_predominante_matematicas,
                            'created_at'   => \Carbon\Carbon::now()->toDateTimeString(),
                            'updated_at'   => \Carbon\Carbon::now()->toDateTimeString(),
                        ]);
                    } else {

                        $count++;

                        echo "---------------------------------------------------------\n";
                        echo $count . "\n";
                        echo $sheet->clave_de_la_escuela . "\n";
                        echo $sheet->turno . "\n"; 
                        echo $getIdNivel($sheet->nivel) . "\n";
                        echo "---------------------------------------------------------\n";

                    }

                } catch(\Exception $ex) {
                    echo "----------------------------------------\n";
                    echo $ex->getMessage() . "\n";
                }

            });

            echo "----------------------------------------\n";
            echo "Not found details of plans results > " . $count;

        });

    }
}
