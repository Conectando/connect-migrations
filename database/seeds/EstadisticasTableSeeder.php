<?php

use Illuminate\Database\Seeder;

class EstadisticasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$excel = storage_path('app/xlsx/cct_estadisticas.xlsx');
    	
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


        $getDetalleEscuela = function($clave_ct, $turno, $nivel_id, $programa_id)
        {
            return  DB::table('detalles_escuelas')
            				->select()
            				->where([
            					'clave_ct'    => $clave_ct,
                                'turno'       => $turno,
            					'nivel_id'    => $nivel_id,
            					'programa_id' => $programa_id,
            				])
            				->first();
        };


        Excel::load($excel, function($reader) use (&$getIdNivel, &$getIdPrograma, &$getDetalleEscuela) {

            $count = 0;

            // $reader->limit(1000);

            $reader->each(function($sheet) use (&$getIdNivel, &$getIdPrograma, &$getDetalleEscuela, &$count) {
                

                $detalleEscuela = $getDetalleEscuela($sheet->clave_ct,
                    $sheet->nom_turno, 
                    $getIdNivel($sheet->nivel), 
                    $getIdPrograma($sheet->programa));

                try {

                    if(!is_null($detalleEscuela)) {
                    	DB::table('estadisticas')->insert([
                            'detalle_escuela_id' => $detalleEscuela->id,
                            'hombres_primero' => $sheet->hombres_1,
							'mujeres_primero' => $sheet->mujeres_1,
							'total_primero' => $sheet->total_1,
							'hombres_segundo' => $sheet->hombres_2,
							'mujeres_segundo' => $sheet->mujeres_2,
							'total_segundo' => $sheet->total_2,
							'hombres_tercero' => $sheet->hombres_3,
							'mujeres_tercero' => $sheet->mujeres_3,
							'total_tercero' => $sheet->total_3,
							'hombres_cuarto' => $sheet->hombres_4,
							'mujeres_cuarto' => $sheet->mujeres_4,
							'total_cuarto' => $sheet->total_4,
							'hombres_quinto' => $sheet->hombres_5,
							'mujeres_quinto' => $sheet->mujeres_5,
							'total_quinto' => $sheet->total_5,
							'hombres_sexto' => $sheet->hombres_6,
							'mujeres_sexto' => $sheet->mujeres_6,
							'total_sexto' => $sheet->total_6,
							'hombres_total' => $sheet->hombres_total,
							'mujeres_total' => $sheet->mujeres_total,
							'matricula_total' => $sheet->matricula_total,
							'docentes' => $sheet->docentes,
							'grupos' => $sheet->grupos,
							'docentes_educacion_fisica' => $sheet->docenete_educacion_fisica,
							'docentes_actividades_artisticas' => $sheet->docente_actividades_artisticas,
							'docentes_actividades_tecnonologicas' => $sheet->docente_actividades_tecnonologicas,
							'docentes_idiomas' => $sheet->docente_de_idiomas,
							'personal_administrativo_servicios' => $sheet->personal_de_administrativo_y_servicios,
							'director_con_grupo' => $sheet->director_con_grupo,
							'director_sin_grupo' => $sheet->director_sin_grupo,
							'total_personal' => $sheet->total_de_personal,
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
            echo "Not found details of schools > " . $count;

        });

    }
}
