<?php

use Illuminate\Database\Seeder;

class IndicadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$excel = storage_path('app/xlsx/cct_indicadores.xlsx');
    	
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
            					'clave_ct' => $clave_ct,
                                'turno' => $turno,
            					'nivel_id' => $nivel_id,
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
                    	DB::table('indicadores')->insert([
                            'detalle_escuela_id' => $detalleEscuela->id,
                            'desercion' => (double)($sheet->desercion_intracurricular == 'N.A.' ? 0 : $sheet->desercion_intracurricular),
                            'reprobacion' => (double)($sheet->reprobacion == 'N.A.' ? 0 : $sheet->reprobacion),
                            'reprobacion_regularizados' => (double)($sheet->reprobacion_con_regularizados == 'N.A.' ? 0 : $sheet->reprobacion_con_regularizados),
                            'eficiencia' => (double)($sheet->eficiencia_terminal == 'N.A.' ? 0 : $sheet->eficiencia_terminal),
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
