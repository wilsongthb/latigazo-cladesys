<?php

use Illuminate\Database\Seeder;

class UserModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($userId = 1)
    {
        
        DB::table('user_modules')->insert(['user_id' => $userId, 'module' => 'credentials']);
        DB::table('user_modules')->insert(['user_id' => $userId, 'module' => 'rsc']);
        DB::table('user_modules')->insert(['user_id' => $userId, 'module' => 'logistic']);
    }
}
