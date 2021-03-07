<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
        $date = Carbon::now();

        $data = array(
            ['sub_nombre' => 'CrzR-CARDENAS', 'sub_descripcion'         => 'Atencion cruz roja', 'sub_calle' => '1ro de Mato', 'fk_mun_id'                       => 2 , 'created_at' => $date->format('Y-m-d')],
            ['sub_nombre' => 'CrzR-EMILIANOZAPATA', 'sub_descripcion'   => 'Atencion cruz roja', 'sub_calle' => 'Tierra y Libertad', 'fk_mun_id'                 => 7 , 'created_at' => $date->format('Y-m-d')],
            ['sub_nombre' => 'CrzR-COMALCALCO', 'sub_descripcion'       => 'Atencion cruz roja', 'sub_calle' => 'Boulevard Adolfo López Mateos 217', 'fk_mun_id' => 5 , 'created_at' => $date->format('Y-m-d')],
            ['sub_nombre' => 'CrzR-JALPADEMÉNDEZ', 'sub_descripcion'    => 'Atencion cruz roja', 'sub_calle' => 'Sin nombre', 'fk_mun_id'                        => 10 , 'created_at' => $date->format('Y-m-d')],
            ['sub_nombre' => 'CrzR-TEAPA', 'sub_descripcion'            => 'Atencion cruz roja', 'sub_calle' => 'Agave', 'fk_mun_id'                             => 16 , 'created_at' => $date->format('Y-m-d')],
            ['sub_nombre' => 'CrzR-TENOSIQUE', 'sub_descripcion'        => 'Atencion cruz roja', 'sub_calle' => 'Alejandro Rovirosa Wade 70', 'fk_mun_id'        => 17 , 'created_at' => $date->format('Y-m-d')],
            ['sub_nombre' => 'CrzR-VILLAHERMOSA', 'sub_descripcion'     => 'Atencion cruz roja', 'sub_calle' => 'Av. Paseo Tabasco', 'fk_mun_id'                 => 4 , 'created_at' => $date->format('Y-m-d')]
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
