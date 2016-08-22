<?php

use Illuminate\Database\Seeder;

use App\Academico;

class AcademicosTableSeeder extends Seeder
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

        	$faker = Faker\Factory::create();

		    $reader->each(function($sheet) use (&$faker) {

		    	if($sheet->director != '0' && 
		    		$sheet->director != 'NO ASIGNADO' && 
		    		$sheet->director != 'ASIGNADO')
		    	{

		    		if(!Academico::where('nombre', $sheet->director)->count())
		    		{
		    			$academico = Academico::create([
				    		'rfc' => $faker->ean13,
				    		'nombre' => $sheet->director
				    	]);

				    	$academico->save();
		    		}
		    	}

			});

		});
    }
}
