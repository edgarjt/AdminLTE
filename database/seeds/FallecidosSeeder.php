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
            ['fk_pac_id' => 2, 'created_at' => '2020-09-04'],
            ['fk_pac_id' => 1, 'created_at' => '2020-07-01'],
            ['fk_pac_id' => 3, 'created_at' => '2020-07-025'],
            ['fk_pac_id' => 4, 'created_at' => '2020-01-012'],
            ['fk_pac_id' => 5, 'created_at' => '2020-06-04']
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
