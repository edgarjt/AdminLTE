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
                ['code' => '1', 'emergencia' => 'EMERGENCIA'],
                ['code' => '2', 'emergencia' => 'BOMBERO'],
                ['code' => '2a', 'emergencia' => 'INCENDIO'],
                ['code' => '2b', 'emergencia' => 'EXPLOSION'],
                ['code' => '2C', 'emergencia' => 'DERRUMBE'],
                ['code' => '2i', 'emergencia' => 'INUNDACION'],
                ['code' => '2f', 'emergencia' => 'FUGA DE GAS'],
                ['code' => '3', 'emergencia' => 'EMERGENCIA GRANDE'],
                ['code' => '3a', 'emergencia' => 'DISTRIBUIRSE EN EL LUGAR'],
                ['code' => '4', 'emergencia' => 'AMBULANCIA'],
                ['code' => '4 14', 'emergencia' => 'AMBULANCIA FORENSE'],
                ['code' => '4 45', 'emergencia' => 'AMB. SEGURO'],
                ['code' => '4 45i', 'emergencia' => 'AMB. ISSSTE'],
                ['code' => '4 45ii', 'emergencia' => 'AMB. ISSET'],
                ['code' => '4 45d', 'emergencia' => 'AMB. DIF'],
                ['code' => '4 45g', 'emergencia' => 'AMB. ROVIROSA'],
                ['code' => '4 45nx', 'emergencia' => 'AMB. NAVAL'],
                ['code' => '4 45x', 'emergencia' => 'AMB. MILITAR'],
                ['code' => '4 45p', 'emergencia' => 'AMB. PEMEX'],
                ['code' => '4r', 'emergencia' => 'RESCATE'],
                ['code' => '5', 'emergencia' => 'HERIDO'],
                ['code' => '5a', 'emergencia' => 'APUÑALADO'],
                ['code' => '5b', 'emergencia' => 'BALEADO'],
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
