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
        DB::table('sedes')->insert(['name'=>'bucaramanga']);        
        DB::table('sedes')->insert(['name'=>'barrancabermeja']);        
        DB::table('sedes')->insert(['name'=>'san gil']);        
    }
}
