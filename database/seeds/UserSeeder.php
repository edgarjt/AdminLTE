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
            ['name' => 'root', 'surname' => 'root', 'email' => 'root@email.com', 'password' => Hash::make('root'), 'state' => 0, 'role' =>0],
            ['name' => 'Edgar', 'surname' => 'jiemenez torres', 'email' => 'edgar@email.com', 'password' => Hash::make('edgar'), 'state' => 1, 'role' =>1],
            ['name' => 'Estefany', 'surname' => 'Serino Gonzales', 'email' => 'estefany@email.com', 'password' => Hash::make('estefany'), 'state' => 0, 'role' =>1]
        );

        $table = DB::table('users');
        //No verfica las llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //Vacia los registros
        $table->truncate();

        foreach ($users as $item) {
            $table->insert($item);
        }
    }
}
