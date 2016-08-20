<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

	$excel = storage_path('app/excel/listado_cct_activos.xlsx');


	Excel::load($excel, function($reader) {

        $reader->take(1);
		
        // $reader->dd();

        $reader->each(function($sheet) {

			// Loop through all rows
			$sheet->each(function($row) {
				return $row;
			});

		});

	});

    return $excel;
});
