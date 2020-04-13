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
        //llamando los seeder que deseamos usar
        $this->call(UsersTableSeeder::class);
    }
}
