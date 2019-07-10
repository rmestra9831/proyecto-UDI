<?php

use Illuminate\Database\Seeder;

class FechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fech_radics')->insert(['id_radicado'=> 0]);                        
    }
}
