<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FallecidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['fk_pac_id' => 2],
            ['fk_pac_id' => 1],
        );

        $table = DB::table('fallecidos');
        //No verfica las llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //Vacia los registros
        $table->truncate();

        foreach ($data as $item) {
            $table->insert($item);
        }
    }
}
