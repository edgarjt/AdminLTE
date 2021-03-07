<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();

        $data = array(
            ['mun_clave' => '001', 'mun_nombre' => 'Balancán', 'mun_siglas'        => 'BAL', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '002', 'mun_nombre' => 'Cardenas', 'mun_siglas'        => 'CAR', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '003', 'mun_nombre' => 'Centla', 'mun_siglas'          => 'CTLA', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '004', 'mun_nombre' => 'Centro', 'mun_siglas'          => 'CEN', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '005', 'mun_nombre' => 'Comalcalco', 'mun_siglas'      => 'COMAL', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '006', 'mun_nombre' => 'Cunduacán', 'mun_siglas'       => 'CUN', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '007', 'mun_nombre' => 'Emiliano Zapata', 'mun_siglas' => 'EMZ', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '008', 'mun_nombre' => 'Humanguillo', 'mun_siglas'     => 'HUIM', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '009', 'mun_nombre' => 'Jalapa', 'mun_siglas'          => 'JAL', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '010', 'mun_nombre' => 'Jalpa de Méndez', 'mun_siglas' => 'JALME', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '011', 'mun_nombre' => 'Jonuta', 'mun_siglas'          => 'JON', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '012', 'mun_nombre' => 'Macuspana', 'mun_siglas'       => 'MAC', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '013', 'mun_nombre' => 'Nacajuca', 'mun_siglas'        => 'NAC', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '014', 'mun_nombre' => 'Paraíso', 'mun_siglas'         => 'PAR', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '015', 'mun_nombre' => 'Tacotalpa', 'mun_siglas'       => 'TAC', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '016', 'mun_nombre' => 'Teapa', 'mun_siglas'           => 'TEA', 'created_at' => $date->format('Y-m-d')],
            ['mun_clave' => '017', 'mun_nombre' => 'Tenosique', 'mun_siglas'       => 'TEN', 'created_at' => $date->format('Y-m-d')],
        );

        $table = DB::table('municipios');
        //No verfica las llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //Vacia los registros
        $table->truncate();

        foreach ($data as $item) {
            $table->insert($item);
        }
    }
}
