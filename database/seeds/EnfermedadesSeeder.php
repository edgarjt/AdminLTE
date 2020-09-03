<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnfermedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['enf_nombre' => 'Fiebre'],
            ['enf_nombre' => 'Diabetes'],
            ['enf_nombre' => 'COVID-19']
        );

        $table = DB::table('enfermedades');
        //No verfica las llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //Vacia los registros
        $table->truncate();

        foreach ($data as $item) {
            $table->insert($item);
        }
    }
}
