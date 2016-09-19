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

Route::get('/', 'HomeController@index');


/**
 *
 */
Route::group(['prefix' => 'api'], function() {
    /**
     *
     */
    Route::group(['prefix' => 'v0.1', 'middleware' => ['api', 'cors']], function() {

        /**
         *
         */
        Route::resource('academics', 'AcademicoController', [
            'only' => [
                'index', 'show', 'store', 'update', 'destroy',
            ],
            'parameters' => [
                'academics' => 'academic_id',
            ],
        ]);

        /**
         *
         */
        Route::resource('educational/levels', 'NivelEducativoController', [
            'only' => [
                'index', 'show',
            ],
            'parameters' => [
                'levels' => 'level_id',
            ],
        ]);

        /**
         *
         */
        Route::resource('educational/programs', 'ProgramaEducativoController', [
            'only' => [
                'index', 'show',
            ],
            'parameters' => [
                'programs' => 'program_id',
            ],
        ]);

        /**
         *
         */
        Route::resource('inegi/locations', 'LocalidadInegiController', [
            'only' => [
                'index', 'show',
            ],
            'parameters' => [
                'locations' => 'location_id',
            ],
        ]);

        /**
         *
         */
        Route::resource('inegi/municipalities', 'MunicipioInegiController', [
            'only' => [
                'index', 'show',
            ],
            'parameters' => [
                'municipalities' => 'municipalitie_id',
            ],
        ]);

        /**
         *
         */
        Route::resource('schools', 'EscuelaController', [
            'only' => [
                'index', 'show',
            ],
            'parameters' => [
                'schools' => 'school_id',
            ],
        ]);

        /**
         *
         */
        Route::resource('schools.details', 'DetalleEscuelaController', [
            'only' => [
                'index', 'show',
            ],
            'parameters' => [
                'details' => 'detail_id',
                'schools' => 'school_id',
            ],
        ]);
        
        /**
         *
         */
        Route::resource('schools.details.statistics', 'EstadisticaController', [
            'only' => [
                'index',
            ],
            'parameters' => [
                'schools' => 'school_id',
                'details' => 'detail_id',
                'statistics' => 'statistic_id',
            ],
        ]);

        /**
         *
         */
        Route::resource('schools.details.indicators', 'IndicadorController', [
            'only' => [
                'index',
            ],
            'parameters' => [
                'schools' => 'school_id',
                'details' => 'detail_id',
                'indicators' => 'indicator_id',
            ],
        ]);

        /**
         *
         */
        Route::resource('schools.details.plans', 'PlaneaController', [
            'only' => [
                'index',
            ],
            'parameters' => [
                'schools' => 'school_id',
                'details' => 'detail_id',
                'plans' => 'plan_id',
            ],
        ]);

        /**
         *
         */
        Route::resource('schools.details.teachers', 'EscuelaAcademicoController', [
            'only' => [
                'index', 'show',
            ],
            'parameters' => [
                'schools' => 'school_id',
                'details' => 'detail_id',
                'teachers' => 'teacher_id',
            ],
        ]);


        /**
         *
         */
        Route::group(['prefix' => 'cct'], function() {
            
            Route::get('{filename}', 'CCTController@index');

            Route::get('download/{filename}', 'CCTController@download');

        });

    });
});