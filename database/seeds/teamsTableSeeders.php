<?php

use Illuminate\Database\Seeder;
use App\Team;

class teamsTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Team::create([
            'name'=>'sharks',
            'active'=>1,
            'contact'=>'sharks@gmail.com',
            'phone'=>'08170160750',
            'password'=>bcrypt('user@56')
        ]);
    }
}
