<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubdelegacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subdelegacion = array(
            ['sub_nombre' => 'Centro', 'sub_descripcion' => 'Descripcion de prueba', 'sub_calle' => 'Calle prueba', 'fk_mun_id' => 1],
            ['sub_nombre' => 'Macuspana', 'sub_descripcion' => 'Descripcion de prueba', 'sub_calle' => 'Calle prueba', 'fk_mun_id' => 2],
            ['sub_nombre' => 'Cunduacan', 'sub_descripcion' => 'Descripcion de prueba', 'sub_calle' => 'Calle prueba', 'fk_mun_id' => 3]
        );

        $table = DB::table('subdelegaciones');

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $table->truncate();

        foreach ($subdelegacion as $item) {
            $table->insert($item);
        }
    }
}
