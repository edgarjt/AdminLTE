<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmergenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emergencia = array(
            ['eme_tipo' => 'Emergencia 1'],
            ['eme_tipo' => 'Emergencia 2'],
            ['eme_tipo' => 'Emergencia 3'],

        );

        $table = DB::table('emergencias');

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $table->truncate();

        foreach ($emergencia as $item) {
            $table->insert($item);
        }
    }
}
