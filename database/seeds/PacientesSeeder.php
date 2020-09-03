<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['pac_nombre' => 'Miguel', 'pac_apellidos'=> 'Zacarias Escobar', 'pac_nacimiento' => '03/05/2000', 'fk_sub_id' => 1, 'fk_enf_id' => 2,'fk_eme_id' => 3, 'fk_use_id' => 3],
            ['pac_nombre' => 'Perla', 'pac_apellidos'=> 'Narvaez Gutierrez', 'pac_nacimiento' => '25/01/1985', 'fk_sub_id' => 3, 'fk_enf_id' => 1,'fk_eme_id' => 2, 'fk_use_id' => 1],
            ['pac_nombre' => 'Dionisio', 'pac_apellidos'=> 'Perez Martinez', 'pac_nacimiento' => '10/11/1999', 'fk_sub_id' => 2, 'fk_enf_id' => 3,'fk_eme_id' => 1, 'fk_use_id' => 2]
        );

        $table = DB::table('pacientes');
        //No verfica las llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //Vacia los registros
        $table->truncate();

        foreach ($data as $item) {
            $table->insert($item);
        }
    }
}
