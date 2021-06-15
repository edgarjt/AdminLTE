<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DelegacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['del_nombre' => 'CrzR-CARDENAS', 'del_descripcion'         => 'Atencion cruz roja', 'del_calle' => '1ro de Mato'],
            ['del_nombre' => 'CrzR-EMILIANOZAPATA', 'del_descripcion'   => 'Atencion cruz roja', 'del_calle' => 'Tierra y Libertad'],
            ['del_nombre' => 'CrzR-COMALCALCO', 'del_descripcion'       => 'Atencion cruz roja', 'del_calle' => 'Boulevard Adolfo López Mateos 217'],
            ['del_nombre' => 'CrzR-JALPADEMÉNDEZ', 'del_descripcion'    => 'Atencion cruz roja', 'del_calle' => 'Sin nombre'],
            ['del_nombre' => 'CrzR-TEAPA', 'del_descripcion'            => 'Atencion cruz roja', 'del_calle' => 'Agave'],
            ['del_nombre' => 'CrzR-TENOSIQUE', 'del_descripcion'        => 'Atencion cruz roja', 'del_calle' => 'Alejandro Rovirosa Wade 70'],
            ['del_nombre' => 'CrzR-VILLAHERMOSA', 'del_descripcion'     => 'Atencion cruz roja', 'del_calle' => 'Av. Paseo Tabasco']
        );

        $table = DB::table('delegaciones');
        //No verfica las llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //Vacia los registros
        $table->truncate();

        foreach ($data as $item) {
            $table->insert($item);
        }
    }
}
