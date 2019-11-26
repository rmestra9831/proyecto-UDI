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
        DB::table('programs')->insert(['name'=>'Direccíon','correo_director'=>'direccion.bca@yopmail.com']);
        DB::table('programs')->insert(['name'=>'Sistemas','correo_director'=>'sistemas.bca@yopmail.com']);
    }
}
