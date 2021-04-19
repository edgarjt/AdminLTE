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
            ['nombre' => 'CrzR-CARDENAS', 'descripcion'         => 'Atencion cruz roja', 'calle' => '1ro de Mato'],
            ['nombre' => 'CrzR-EMILIANOZAPATA', 'descripcion'   => 'Atencion cruz roja', 'calle' => 'Tierra y Libertad'],
            ['nombre' => 'CrzR-COMALCALCO', 'descripcion'       => 'Atencion cruz roja', 'calle' => 'Boulevard Adolfo López Mateos 217'],
            ['nombre' => 'CrzR-JALPADEMÉNDEZ', 'descripcion'    => 'Atencion cruz roja', 'calle' => 'Sin nombre'],
            ['nombre' => 'CrzR-TEAPA', 'descripcion'            => 'Atencion cruz roja', 'calle' => 'Agave'],
            ['nombre' => 'CrzR-TENOSIQUE', 'descripcion'        => 'Atencion cruz roja', 'calle' => 'Alejandro Rovirosa Wade 70'],
            ['nombre' => 'CrzR-VILLAHERMOSA', 'descripcion'     => 'Atencion cruz roja', 'calle' => 'Av. Paseo Tabasco']
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
