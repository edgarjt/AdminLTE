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
            ['pac_nombre' => 'Miguel', 'pac_apellidos'      => 'Zacarias Escobar', 'pac_nacimiento'     => '03/05/2000', 'fk_sub_id' => 1, 'fk_enf_id' => 2,'fk_eme_id' => 3, 'fk_use_id' => 3, 'created_at' => '2020-10-04'],
            ['pac_nombre' => 'Perla', 'pac_apellidos'       => 'Narvaez Gutierrez', 'pac_nacimiento'    => '25/01/1985', 'fk_sub_id' => 3, 'fk_enf_id' => 1,'fk_eme_id' => 2, 'fk_use_id' => 1, 'created_at' => '2020-09-08'],
            ['pac_nombre' => 'Dionisio', 'pac_apellidos'    => 'Perez Martinez', 'pac_nacimiento'       => '10/11/1999', 'fk_sub_id' => 2, 'fk_enf_id' => 3,'fk_eme_id' => 1, 'fk_use_id' => 3, 'created_at' => '2020-12-03'],
            ['pac_nombre' => 'Juan', 'pac_apellidos'        => 'Ocaña Zepeda', 'pac_nacimiento'         => '12/09/1996', 'fk_sub_id' => 5, 'fk_enf_id' => 2,'fk_eme_id' => 2, 'fk_use_id' => 4, 'created_at' => '2020-01-02'],
            ['pac_nombre' => 'Omar', 'pac_apellidos'        => 'Qué Lázaro', 'pac_nacimiento'           => '14/02/1996', 'fk_sub_id' => 7, 'fk_enf_id' => 1,'fk_eme_id' => 2, 'fk_use_id' => 3, 'created_at' => '2020-08-04'],
            ['pac_nombre' => 'Karla', 'pac_apellidos'       => 'Velasquez Arellano', 'pac_nacimiento'   => '15/12/1996', 'fk_sub_id' => 4, 'fk_enf_id' => 2,'fk_eme_id' => 2, 'fk_use_id' => 2, 'created_at' => '2020-05-07'],
            ['pac_nombre' => 'Hilaritza', 'pac_apellidos'   => 'De la Cruz Arias', 'pac_nacimiento'     => '11/05/1998', 'fk_sub_id' => 6, 'fk_enf_id' => 3,'fk_eme_id' => 3, 'fk_use_id' => 7, 'created_at' => '2020-03-12'],
            ['pac_nombre' => 'Alejandro', 'pac_apellidos'   => 'Hau Isidro', 'pac_nacimiento'           => '16/06/1996', 'fk_sub_id' => 3, 'fk_enf_id' => 1,'fk_eme_id' => 3, 'fk_use_id' => 7, 'created_at' => '2020-12-13'],
            ['pac_nombre' => 'Mary', 'pac_apellidos'        => 'Montejo Ramón', 'pac_nacimiento'        => '03/05/1996', 'fk_sub_id' => 2, 'fk_enf_id' => 2,'fk_eme_id' => 1, 'fk_use_id' => 4, 'created_at' => '2020-11-20'],
            ['pac_nombre' => 'Carlos', 'pac_apellidos'      => 'De la Cruz Rodríguez', 'pac_nacimiento' => '25/11/1996', 'fk_sub_id' => 1, 'fk_enf_id' => 3,'fk_eme_id' => 2, 'fk_use_id' => 8, 'created_at' => '2020-11-25'],
            ['pac_nombre' => 'Manuel', 'pac_apellidos'      => 'Soberano Ocaña', 'pac_nacimiento'       => '10/04/1996', 'fk_sub_id' => 2, 'fk_enf_id' => 3,'fk_eme_id' => 1, 'fk_use_id' => 3, 'created_at' => '2020-09-15']
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
