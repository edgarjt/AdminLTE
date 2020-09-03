<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmergenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['eme_tipo' => 'ATENCIÓN A EMERGENCIAS GINECOOBSTETRICAS'],
            ['eme_tipo' => 'ATENCIÓN DE EMERGENCIAS RELACIONADOS A ACCIDENTES VÍALES'],
            ['eme_tipo' => 'ATENCIÓN DE EMERGENCIAS RELACIONADOS A VIOLENCIA'],
            ['eme_tipo' => 'ATENCIÓN A EMERGENCIAS POR DIVERSAS CAUSAS SIN VIOLENCIA']
        );

        $table = DB::table('emergencias');
        //No verfica las llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //Vacia los registros
        $table->truncate();

        foreach ($data as $item) {
            $table->insert($item);
        }
    }
}
