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
        $this->call(EstadoSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(SubdelegacionSeeder::class);
        $this->call(EnfermedadSeeder::class);
        $this->call(EmergenciaSeeder::class);
        $this->call(ServicioSeeder::class);
    }
}
