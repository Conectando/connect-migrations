<?php

use Illuminate\Database\Seeder;

class AcademicosTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$excel = storage_path('app/xlsx/listado_cct_activos.xlsx');

        Excel::load($excel, function($reader) {

        	$faker = Faker\Factory::create();

		    $reader->each(function($sheet) use (&$faker) {

		    	if($sheet->director != '0' && 
		    		$sheet->director != 'NO ASIGNADO' && 
		    		$sheet->director != 'ASIGNADO')
		    	{

		    		$count = DB::table('academicos')->select()->where('nombre', utf8_decode($sheet->director))->count();

		    		if($count == 0)
		    		{
		    			DB::table('academicos')->insert([
				    		'rfc' => $faker->ean13, // rfc random
				    		'nombre' => utf8_decode($sheet->director),
				    		'telefono' => $faker->e164PhoneNumber, // telefono random
				    		'celular' => $faker->e164PhoneNumber, // celular random
				    		'correo'  => $faker->email, // correo random
				    		'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        	'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
				    	]);
					}
		    	}

			});

		});
    }
}
