<?php

use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert(['name'=>'direccíon','correo_director'=>'direccion@nextemail.in']);
        DB::table('programs')->insert(['name'=>'industrial','correo_director'=>'industrial@nextemail.in']);
        DB::table('programs')->insert(['name'=>'administración','correo_director'=>'administración@nextemail.in']);
        DB::table('programs')->insert(['name'=>'psicologia','correo_director'=>'psicologia@nextemail.in']);
        DB::table('programs')->insert(['name'=>'sistemas','correo_director'=>'sistemas@nextemail.in']);
        DB::table('programs')->insert(['name'=>'electronica','correo_director'=>'electronica@nextemail.in']);
    }
}
