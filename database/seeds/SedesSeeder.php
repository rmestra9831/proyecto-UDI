<?php

use Illuminate\Database\Seeder;

class SedesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sedes')->insert(['name'=>'bucaramanga','cont_radic'=>0]);        
        DB::table('sedes')->insert(['name'=>'barrancabermeja','cont_radic'=>0]);        
        DB::table('sedes')->insert(['name'=>'san gil','cont_radic'=>0]);        
    }
}
