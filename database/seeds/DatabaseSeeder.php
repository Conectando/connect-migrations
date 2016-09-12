<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run commands seeds in this order
     *
     * php artisan db:seed
     * php artisan db:seed --class=EscuelasTableSeeder
     * php artisan db:seed --class=DetallesEscuelasTableSeeder
     * php artisan db:seed --class=EscuelasAcademicosTableSeeder
     * php artisan db:seed --class=EstadisticasTableSeeder
     * php artisan db:seed --class=IndicadoresTableSeeder
     * php artisan db:seed --class=ResultadosPlaneaTableSeeder
     *
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Orden en el que deben ser creadas las migraciones
        $this->call(AcademicosTableSeeder::class);
        $this->call(ProgramasEducativosTableSeeder::class);
        $this->call(NivelesEducativosTableSeeder::class);
        $this->call(LocalidadesInegiTableSeeder::class);
        $this->call(MunicipiosInegiTableSeeder::class);
        // $this->call(EscuelasTableSeeder::class);
        // $this->call(DetallesEscuelasTableSeeder::class);
        // $this->call(EscuelasAcademicosTableSeeder::class);
        // $this->call(EstadisticasTableSeeder::class);
        // $this->call(IndicadoresTableSeeder::class);
        // $this->call(ResultadosPlaneaTableSeeder::class);
    }
}
