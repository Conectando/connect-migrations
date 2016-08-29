<?php

use Illuminate\Database\Seeder;

class LocalidadesInegiTableSeeder extends Seeder
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

		    $reader->each(function($sheet) {

		    	if(is_null(DB::table('localidades_inegi')->select()->find((int)$sheet->localidad_inegi)))
		    	{
		    		DB::table('localidades_inegi')->insert([
                        'id' => $sheet->localidad_inegi,
		    			'nombre' => utf8_decode($sheet->nombre_localidad),
                        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
		    		]);
		    	}

			});

		});
    }

}
