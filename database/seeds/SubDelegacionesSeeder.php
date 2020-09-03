<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubDelegacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['sub_nombre' => 'CrzR-MAC', 'sub_descripcion' => 'Atencion cruz roja', 'sub_calle' => 'Abazolo', 'fk_mun_id' => 1],
            ['sub_nombre' => 'CrzR-NAC', 'sub_descripcion' => 'Atencion cruz roja', 'sub_calle' => 'Constitucion', 'fk_mun_id' => 2],
            ['sub_nombre' => 'CrzR-CUN', 'sub_descripcion' => 'Atencion cruz roja', 'sub_calle' => 'Madero', 'fk_mun_id' => 3]
        );

        $table = DB::table('subdelegaciones');
        //No verfica las llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //Vacia los registros
        $table->truncate();

        foreach ($data as $item) {
            $table->insert($item);
        }
    }
}
