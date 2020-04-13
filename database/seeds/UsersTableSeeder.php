<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creando un usuario manualmente
        User::create([
            "name"=>"jose ignacio",
            "email"=>"jose@gmail.com",
            "password"=>bcrypt('12345')
        ]);
    }
}
