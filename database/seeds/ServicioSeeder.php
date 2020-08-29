<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servicio = array(
            ['ser_total' => 4, 'fk_enf_id' => 1, 'fk_eme_id' => 1, 'fk_sub_id' => 1],
            ['ser_total' => 3, 'fk_enf_id' => 2, 'fk_eme_id' => 2, 'fk_sub_id' => 2],
            ['ser_total' => 7, 'fk_enf_id' => 3, 'fk_eme_id' => 3, 'fk_sub_id' => 3],

        );

        $table = DB::table('servicios');

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $table->truncate();

        foreach ($servicio as $item) {
            $table->insert($item);
        }
    }
}
