<?php

use Illuminate\Database\Seeder;
use App\User;
class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([

            'name'=>'Admin',
            'email'=>'efe@volleyball.ng',
            'password'=>bcrypt('serverGuy@1234'),
            'username'=>'efejesu',
            'remember_token'=>str_random(10)
        ]);
    }
}
