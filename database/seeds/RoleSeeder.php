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
        DB::table('roles')->insert(['name_role'=>'Administrador']);        
        DB::table('roles')->insert(['name_role'=>'Registro y Control']);        
        DB::table('roles')->insert(['name_role'=>'Direccion']);        
        DB::table('roles')->insert(['name_role'=>'Dirección de programa']);        
        DB::table('roles')->insert(['name_role'=>'Super Administrador']);        
    }
}
