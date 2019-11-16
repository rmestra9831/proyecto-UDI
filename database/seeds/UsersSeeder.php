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
            'sede'=>'1',
            'password'=> bcrypt('123'),
        ]);
        DB::table('users')->insert([
            'name'=>'admin',
            'type_user'=>'1',
            'sede'=>'1',
            'password'=> bcrypt('123'),
        ]);
        DB::table('users')->insert([
            'name'=>'richard',
            'type_user'=>'2',
            'sede'=>'1',
            'password'=> bcrypt('123'),
        ]);
        DB::table('users')->insert([
            'name'=>'andres',
            'type_user'=>'3',
            'sede'=>'1',
            'password'=> bcrypt('123'),
        ]);
        DB::table('users')->insert([
            'name'=>'carlos',
            'type_user'=>'4',
            'sede'=>'1',
            'password'=> bcrypt('123'),
        ]);
        // aqui van los usuarios de barranca
        DB::table('users')->insert([
            'name'=>'admin2',
            'type_user'=>'1',
            'sede'=>'2',
            'password'=> bcrypt('123'),
        ]);
        DB::table('users')->insert([
            'name'=>'cris',
            'sede'=>'2',
            'type_user'=>'2',
            'password'=> bcrypt('123'),
        ]);
        DB::table('users')->insert([
            'name'=>'juan',
            'sede'=>'2',
            'type_user'=>'3',
            'password'=> bcrypt('123'),
        ]);
        DB::table('users')->insert([
            'name'=>'karol',
            'sede'=>'2',
            'type_user'=>'4',
            'password'=> bcrypt('123'),
        ]);
    }
}
