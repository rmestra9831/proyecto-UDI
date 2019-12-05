<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'superadmin',
            'type_user'=>'5',
            'sede'=>'2',
            'password'=> bcrypt('SuperAdmUDI'),
            'program_id'=>null
        ]);
    }
}
