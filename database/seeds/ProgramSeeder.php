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
        DB::table('programs')->insert(['name'=>'direccíon','correo_director'=>'direccion@udi.edu.co']);
        DB::table('programs')->insert(['name'=>'industrial','correo_director'=>'industrial@udi.edu.co']);
        DB::table('programs')->insert(['name'=>'administración','correo_director'=>'administración@udi.edu.co']);
        DB::table('programs')->insert(['name'=>'psicologia','correo_director'=>'psicologia@udi.edu.co']);
        DB::table('programs')->insert(['name'=>'sistemas','correo_director'=>'sistemas@udi.edu.co']);
        DB::table('programs')->insert(['name'=>'electronica','correo_director'=>'electronica@udi.edu.co']);
    }
}
