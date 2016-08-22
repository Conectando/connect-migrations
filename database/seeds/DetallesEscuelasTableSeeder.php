<?php

use Illuminate\Database\Seeder;

use App\{Academico, Escuela, ProgramaEducativo};

class DetallesEscuelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$excel = storage_path('app/excel/listado_cct_activos.xlsx');

    	$academicos = Academico::all();
    	$programas = ProgramaEducativo::all();
        $niveles = NivelEducativo::all();
        
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

        Excel::load($excel, function($reader) use (&$getIdNivel, &$getIdPrograma, &$getRfcAcademico) {

            $reader->limit(5);

            $reader->each(function($sheet) use (&$getIdNivel, &$getIdPrograma, &$getRfcAcademico) {
                
                $direccion = $sheet->domicilio == 'CONOCIDO' ? null : $sheet->domicilio;

                $escuela = null;

                if($sheet->codigo_postal == '0') {
                    $escuela = Escuela::where([
                        'nombre_ct'     => $sheet->nombre_ct,
                        'direccion'     => $direccion
                    ])->first();
                } else {
                    $escuela = Escuela::where([
                        'nombre_ct'     => $sheet->nombre_ct,
                        'codigo_postal' => $sheet->codigo_postal
                    ])->first();
                }

                $detalleEscuela = DetalleEscuela::create([

                ]);

            });

        });

    }
}
