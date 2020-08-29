<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipio = array(
            ['mun_clave' => '001Clave', 'mun_nombre' => 'Tabasco', 'mun_siglas' => 'TAB', 'fk_est_id' => 1],
            ['mun_clave' => '002Clave', 'mun_nombre' => 'Monterrey', 'mun_siglas' => 'MTY', 'fk_est_id' => 2],
            ['mun_clave' => '003Clave', 'mun_nombre' => 'Guadalajara', 'mun_siglas' => 'GDL', 'fk_est_id' => 3]
        );

        $table = DB::table('municipios');

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $table->truncate();

        foreach ($municipio as $item) {
            $table->insert($item);
        }
    }
}
