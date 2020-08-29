<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnfermedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enfermedad = array(
            ['enf_nombre' => 'Varicela'],
            ['enf_nombre' => 'Fiebre'],
            ['enf_nombre' => 'Tos'],

        );

        $table = DB::table('enfermedades');

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $table->truncate();

        foreach ($enfermedad as $item) {
            $table->insert($item);
        }
    }
}
