<?php
/*
Informacion basica para el funcionamiento de la aplicacion y la base de datos
*/

use Illuminate\Database\Seeder;
use \DB as DB;

class basics extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'UserRoot',
            'email' => 'root@localhost',
            'password' => bcrypt('root')
        ]);

        DB::table('locations')->insert([
            [
                'type' => '1',
                'name' => 'ALMACEN GENERAL',
                'utility' => '5',
                'user_id' => '1'
            ],
            [
                'type' => '2',
                'name' => 'AREA DE RECEPCION',
                'utility' => '0',
                'user_id' => '1'
            ],
            [
                'type' => '2',
                'name' => 'AREA DE RADIOLOGIA',
                'utility' => '0',
                'user_id' => '1'
            ],
            [
                'type' => '2',
                'name' => 'AREA DE LABORATORIO',
                'utility' => '0',
                'user_id' => '1'
            ],
            [
                'type' => '2',
                'name' => 'AREA DE BIOSEGURIDAD',
                'utility' => '0',
                'user_id' => '1'
            ]
        ]);
    }
}
