<?php

use Illuminate\Database\Seeder;
use App\ProgramaEducativo;

class ProgramasEducativosSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$programas = [
			'GENERAL',
			'INDIGENA',
			'CONAFE',
			'CENDI',
			'TECNICA',
			'TELESECUNDARIA',
			'PROFESIONAL MEDIO',
			'TECNOLOGICO',
			'BTS NO ESC',
			'BIS NO ESC'
		];
        
		foreach ($programas as $programa) 
		{
			$programaEducativo = ProgramaEducativo::create([
	            'nombre' => $programa
	        ]);	

			$programaEducativo->save();

		}


    }
}
