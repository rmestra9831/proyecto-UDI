<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(SedesSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(MotivoSeeder::class);
    }
}
