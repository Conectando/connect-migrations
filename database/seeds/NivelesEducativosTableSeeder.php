<?php

use Illuminate\Database\Seeder;
use App\NivelEducativo;

class NivelesEducativosSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveles = [
            'PREESCOLAR',
            'PRIMARIA',
            'SECUNDARIA',
            'BACHILLERATO',
            'PROFESIONAL TECNICO'
        ];
        
        foreach ($niveles as $nivel) 
        {
            $nivelEducativo = NivelEducativo::create([
                'nombre' => $nivel
            ]); 

            $nivelEducativo->save();

        }
    }
}
