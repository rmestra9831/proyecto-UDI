<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(['name_role'=>'administrador']);        
        DB::table('roles')->insert(['name_role'=>'registro_control']);        
        DB::table('roles')->insert(['name_role'=>'direccion']);        
    }
}
