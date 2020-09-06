<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(SubDelegacionesSeeder::class);
        $this->call(EnfermedadesSeeder::class);
        $this->call(EmergenciasSeeder::class);
        $this->call(PacientesSeeder::class);
    }
}
