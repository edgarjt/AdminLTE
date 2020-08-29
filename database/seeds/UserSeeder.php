<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create users root
        $users = array(
            ['name' => 'root', 'surname' => 'root', 'email' => 'root@email.com', 'password' => Hash::make('root'), 'fk_sub_id' => 1],
            ['name' => 'Edgar', 'surname' => 'jiemenez torres', 'email' => 'edgar@email.com', 'password' => Hash::make('edgar'), 'fk_sub_id' => 1],
            ['name' => 'Estefany', 'surname' => 'Serino Gonzales', 'email' => 'estefany@email.com', 'password' => Hash::make('estefany'), 'fk_sub_id' => 2]
        );

        //No verfica las llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //Vacia los registros
        DB::table('users')->truncate();

        foreach ($users as $item) {
            DB::table('users')->insert($item);
        }
    }
}
