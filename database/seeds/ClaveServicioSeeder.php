<?php

use App\ClaveServicio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClaveServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $data = [
                ['cla_code' => '1', 'cla_emergencia' => 'EMERGENCIA'],
                ['cla_code' => '2', 'cla_emergencia' => 'BOMBERO'],
                ['cla_code' => '2a', 'cla_emergencia' => 'INCENDIO'],
                ['cla_code' => '2b', 'cla_emergencia' => 'EXPLOSION'],
                ['cla_code' => '2C', 'cla_emergencia' => 'DERRUMBE'],
                ['cla_code' => '2i', 'cla_emergencia' => 'INUNDACION'],
                ['cla_code' => '2f', 'cla_emergencia' => 'FUGA DE GAS'],
                ['cla_code' => '3', 'cla_emergencia' => 'EMERGENCIA GRANDE'],
                ['cla_code' => '3a', 'cla_emergencia' => 'DISTRIBUIRSE EN EL LUGAR'],
                ['cla_code' => '4', 'cla_emergencia' => 'AMBULANCIA'],
                ['cla_code' => '4 14', 'cla_emergencia' => 'AMBULANCIA FORENSE'],
                ['cla_code' => '4 45', 'cla_emergencia' => 'AMB. SEGURO'],
                ['cla_code' => '4 45i', 'cla_emergencia' => 'AMB. ISSSTE'],
                ['cla_code' => '4 45ii', 'cla_emergencia' => 'AMB. ISSET'],
                ['cla_code' => '4 45d', 'cla_emergencia' => 'AMB. DIF'],
                ['cla_code' => '4 45g', 'cla_emergencia' => 'AMB. ROVIROSA'],
                ['cla_code' => '4 45nx', 'cla_emergencia' => 'AMB. NAVAL'],
                ['cla_code' => '4 45x', 'cla_emergencia' => 'AMB. MILITAR'],
                ['cla_code' => '4 45p', 'cla_emergencia' => 'AMB. PEMEX'],
                ['cla_code' => '4r', 'cla_emergencia' => 'RESCATE'],
                ['cla_code' => '5', 'cla_emergencia' => 'HERIDO'],
                ['cla_code' => '5a', 'cla_emergencia' => 'APUÑALADO'],
                ['cla_code' => '5b', 'cla_emergencia' => 'BALEADO'],
            ];


        $table = DB::table('clave_servicio');
        //No verfica las llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //Vacia los registros
        $table->truncate();

        foreach ($data as $item) {
            $table->insert($item);
        }

    }
}
