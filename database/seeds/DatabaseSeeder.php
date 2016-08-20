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
        $this->call(AcademicosSeeder::class);
        $this->call(ProgramasEducativosSeeder::class);
        $this->call(NivelesEducativosSeeder::class);
        $this->call(EscuelasSeeder::class);
    }
}
