<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class municipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['mun_clave' => '001', 'mun_nombre' => 'Macuspana', 'mun_siglas' => 'MAC'],
            ['mun_clave' => '002', 'mun_nombre' => 'Nacajuca', 'mun_siglas' => 'NAC'],
            ['mun_clave' => '003', 'mun_nombre' => 'Cunduacan', 'mun_siglas' => 'CUN'],
        );

        $table = DB::table('municipios');
        //No verfica las llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //Vacia los registros
        $table->truncate();

        foreach ($data as $item) {
            $table->insert($item);
        }
    }
}
