<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AcademicosTableSeeder::class);
        $this->call(ProgramasEducativosTableSeeder::class);
        $this->call(NivelesEducativosTableSeeder::class);
        $this->call(LocalidadesInegiTableSeeder::class);
        $this->call(MunicipiosInegiTableSeeder::class);
        // $this->call(EscuelasTableSeeder::class);
        // $this->call(DetallesEscuelasTableSeeder::class);
    }
}
