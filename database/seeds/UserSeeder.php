<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
        $date = Carbon::now();
        $users = array(
            ['name' => 'root', 'surname'    => 'root', 'email'              => 'root@email.com', 'password'     => Hash::make('root'), 'state'      => 0, 'role'    =>0, 'notification' => 1, 'created_at' => $date->format('Y-m-d')],
            ['name' => 'Edgar', 'surname'   => 'jiemenez torres', 'email'   => 'edgar@email.com', 'password'    => Hash::make('edgar'), 'state'     => 1, 'role'    =>1, 'notification' => 1, 'created_at' => $date->format('Y-m-d')],
            ['name' => 'Antonio', 'surname' => 'Silvan', 'email'            => 'antonio@email.com', 'password'  => Hash::make('antonio'), 'state'   => 1, 'role'    =>1, 'notification' => 1, 'created_at' => $date->format('Y-m-d')],
            ['name' => 'Diana', 'surname'   => 'Arias', 'email'             => 'diana@email.com', 'password'    => Hash::make('diana'), 'state'     => 1, 'role'    =>1, 'notification' => 1, 'created_at' => $date->format('Y-m-d')],
            ['name' => 'Jesús', 'surname'   => 'Zepeda', 'email'            => 'jesus@email.com', 'password'    => Hash::make('jesus'), 'state'     => 1, 'role'   =>1, 'notification' => 1, 'created_at' => $date->format('Y-m-d')],
            ['name' => 'Paola', 'surname'   => 'Arellano', 'email'          => 'paola@email.com', 'password'    => Hash::make('paola'), 'state'     => 1, 'role'   =>1, 'notification' => 1, 'created_at' => $date->format('Y-m-d')],
            ['name' => 'Ricardo', 'surname' => 'López', 'email'             => 'ricardo@email.com', 'password'  => Hash::make('ricardo'), 'state'   => 1, 'role'   =>1, 'notification' => 1, 'created_at' => $date->format('Y-m-d')],
            ['name' => 'Cristell', 'surname'=> 'Cerino', 'email'            => 'cristell@email.com', 'password' => Hash::make('cristell'), 'state'  => 1, 'role'    =>1, 'notification' => 1, 'created_at' => $date->format('Y-m-d')],
            ['name' => 'Yessenia', 'surname'=> 'Parra', 'email'             => 'yessenia@email.com', 'password' => Hash::make('yessenia'), 'state'  => 1, 'role'    =>1, 'notification' => 1, 'created_at' => $date->format('Y-m-d')],
            ['name' => 'José', 'surname'    => 'Hernández', 'email'         => 'jose@email.com', 'password'     => Hash::make('jose'), 'state'      => 1, 'role'    =>1, 'notification' => 1, 'created_at' => $date->format('Y-m-d')]
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
