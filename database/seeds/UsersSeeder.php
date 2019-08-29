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
            'name'=>'richard',
            'type_user'=>'2',
            'password'=> bcrypt('123'),
        ]);
        DB::table('users')->insert([
            'name'=>'andres',
            'type_user'=>'3',
            'password'=> bcrypt('123'),
        ]);
        DB::table('users')->insert([
            'name'=>'admin',
            'type_user'=>'1',
            'password'=> bcrypt('123'),
        ]);
    }
}
