<?php

namespace App\Http\Controllers\Organizer;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Organizer;

class organizerPagesController extends Controller
{
    //
    public function signin(){
        return view('organizer.login');
    }

    public function dashboard(){
        //get all the events for the organizer
        //$events=Event::where
        try{
            $organizer=Organizer::whereId(auth('organizer')->user()->id)->firstOrFail();
            return view('organizer.dashboard',compact('organizer'));
        }catch (ModelNotFoundException $e){
            return 'not found';
        }



    }
}
