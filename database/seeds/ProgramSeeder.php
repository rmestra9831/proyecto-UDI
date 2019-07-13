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
        DB::table('programs')->insert(['name'=>'direccíon','correo_director'=>'direccion@maxmail.in']);
        DB::table('programs')->insert(['name'=>'industrial','correo_director'=>'industrial@maxmail.in']);
        DB::table('programs')->insert(['name'=>'administración','correo_director'=>'administración@maxmail.in']);
        DB::table('programs')->insert(['name'=>'psicologia','correo_director'=>'psicologia@maxmail.in']);
        DB::table('programs')->insert(['name'=>'sistemas','correo_director'=>'sistemas@maxmail.in']);
        DB::table('programs')->insert(['name'=>'electronica','correo_director'=>'electronica@maxmail.in']);
    }
}
