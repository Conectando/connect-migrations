<?php

use Illuminate\Database\Seeder;
use App\ProgramaEducativo;

class ProgramasEducativosTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$programas = [
			[
				'nombre' => 'GENERAL',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
			],
			[
				'nombre' => 'INDIGENA',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
			],
			[
				'nombre' => 'CONAFE',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
			],
			[
				'nombre' => 'CENDI',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
			],
			[
				'nombre' => 'TECNICA',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
			],
			[
				'nombre' => 'TELESECUNDARIA',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
			],
			[
				'nombre' => 'PROFESIONAL MEDIO',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
			],
			[
				'nombre' => 'TECNOLOGICO',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
			],
			[
				'nombre' => 'BTS NO ESC',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
			],
			[
				'nombre' => 'BIS NO ESC',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
			],
		];
        
        DB::table('programas_educativos')->insert($programas);


    }
}
