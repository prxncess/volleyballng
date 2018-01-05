<?php

use Illuminate\Database\Seeder;
use App\Event;
class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Event::create([
            'title'=>'olympics',
            'status'=>'review',
            'e_organizer'=>'micheal adetunji',
            'e_email'=>'adetunjimicheal@gmail.com',
            'e_phone'=>'08170160750',
            'password'=>bcrypt('user@56'),
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
