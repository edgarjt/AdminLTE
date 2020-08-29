<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado = array(
            ['est_clave' => '001Clave', 'est_name' => 'Tabasco', 'est_siglas' => 'TAB'],
            ['est_clave' => '002Clave', 'est_name' => 'Monterrey', 'est_siglas' => 'MTY'],
            ['est_clave' => '003Clave', 'est_name' => 'Guadalajara', 'est_siglas' => 'GDL']
        );
        
        $table = DB::table('estados');

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $table->truncate();

        foreach ($estado as $item) {
            $table->insert($item);
        }
    }
}
